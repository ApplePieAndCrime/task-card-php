import { redirectPost } from './functions.js'
const reg_form = document.forms.reg_form
const submit_btn = document.querySelector('.reg-btn')

submit_btn.onclick = async (e) => {
  e.preventDefault()
  const email = reg_form.email
  const username = reg_form.username
  const password = reg_form.password

  if(email.value=='' || username.value=='' || password.value=='') {
    alert('Заполни пустые поля!')
    return
  }

  await fetch('scripts/reg.php', {
    method: 'POST',
    body: new FormData(reg_form)
  })
    .then(res => res.json())
    .then(data => {
      if(data.id) {
        alert('Вы успешно зарегистрированы!')
        redirectPost('/',data)
      }
      else {
        alert(data)
      }
    })
    .catch(error => {
      console.log(error)
    })
}
