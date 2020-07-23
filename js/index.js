const add_btn = document.querySelector('.task-add')
const edit_btn = document.querySelector('.task-edit')
const delete_btn = document.querySelector('.task-delete')
const input = document.querySelector('.task-input')

const task_container = document.querySelector('.task-list')

let selected_task = {
  id: 0,
  name: '',
  user_id: document.querySelector('.username').dataset.user_id,
  is_done: 0
}

input.oninput = () => {
  selected_task.name = input.value
}

function clear_selected() {
  input.value = ''
  selected_task.id = 0
  selected_task.name = ''
  selected_task.is_done = 0
}

function refresh_task () {
  let task_list = document.querySelectorAll('.task-el')

  task_list.forEach((el, i) => {
    el.onclick = (e) => {
      let target = e.target
      let el_id = i
      if(target.tagName == "LABEL") {
        if(el.className.includes('selected')) {
          selected_task.is_done = selected_task.is_done ? 0 : 1
        }
      }
      if(target.tagName != "SPAN")
        return
      task_list.forEach((el, i) => {
        if(el_id==i) {
          if(el.className.includes('selected')) {
            el.classList.remove('selected')
            clear_selected()
          }
          else {
            el.classList.add('selected')
            input.value = target.textContent
            selected_task.id = el.dataset.id
            selected_task.name = target.textContent
            selected_task.is_done = el.querySelector(`#id-${el.dataset.id}`).checked ? 1 : 0
          }
        }
        else
          el.classList.remove('selected')
      })
    }
  })
}

refresh_task()

add_btn.onclick = async () => {
  if(selected_task.name=='') {
    alert('Пустая задача');
    return;
  }
  await fetch('/scripts/add_task.php', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify(selected_task),
  })
    .then(res => {
      return res.text()
    })
    .then(data => {
      task_container.innerHTML = data + task_container.innerHTML
      refresh_task()
      clear_selected()
    })
}

edit_btn.onclick = async () => {
  await fetch('/scripts/edit_task.php', {
    method: "POST",
    headers: {
      'Content-Type': 'application/json'
    },
    body: JSON.stringify(selected_task)
  })
    .then(res =>  {
      return res.text()
    })
    .then(data => {
      const editted_task = document.querySelector(`.task-el[data-id="${selected_task.id}"]`)
      editted_task.innerHTML = data
      refresh_task()
      clear_selected()
    })
    .catch(error => {
      alert('Выделите что-нибудь')
    })
}

delete_btn.onclick = async () => {
  if(selected_task.id==0) {
    alert('Выделите что-нибудь')
    return
  }
  if(!confirm('Удалить выбранную задачу?'))
    return

  await fetch(`/scripts/delete_task.php/?id=${selected_task.id}`)
    .then(res => {
      return res.text()
    })
    .then(data => {
      const editted_task = document.querySelector(`.task-el[data-id="${selected_task.id}"]`)
      editted_task.remove()
      clear_selected()
    })
}