import { redirectPost } from './functions.js'
var login_form = document.forms.login_form
var submit_btn = document.querySelector('.login-btn')

submit_btn.onclick = async function(e) {
  e.preventDefault();
  var email = login_form.elements.email
  var password = login_form.elements.password
  if(email.value=='' || password.value=='') {
    alert('Заполни пустые поля!')
    return
  }
  await fetch('scripts/auth.php', {
    method: 'POST',
    body: new FormData(login_form)
  })
    .then(res => res.json())
    .then(data => {
      if (data.id) {
        redirectPost('/',data)
      }
      else {
        alert(data.error)
      }
    })
}

