let open = false,
  result,
  data = {},
  elements;

const form = document.querySelector(".contact");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  elements = [...e.target.elements];
  elements.forEach(({ name, value }) => name && (data[name] = value))
  console.log(data);
  await downloadpdf(data);
  /* const number = '+91' + data.contact;
   showStatus('notify', 'INFO', 'verifying...');
   initOtpReq(number);*/
});

//init otp req
function initOtpReq(number) {
  let option = {
    'size': 'invisible',
  }
  let recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha', option);
  firebase.auth().signInWithPhoneNumber(number, recaptchaVerifier)
    .then(confirmation => {
      result = confirmation;
      showPopup();
    })
    .catch(err => showStatus('notify', 'FAILED', err.message))
}
//verify otp 
function verifyOtp(e) {
  e.preventDefault();
  const otp = e.path[1].elements[0].value;

  if (otp) {
    console.log(otp)
    result.confirm(otp)
      .then(() => {
        showStatus('otp', 'SUCCESS', 'verified')
        showPopup()
        sendData(data);
      })
      .catch((err) => showStatus('otp', 'FAILED', err.message))
  }

}

//IN MODIFICTION xhr -> fetch
async function downloadpdf(data) {

  try {
    const res = await fetch('/higher/php/downloadpdf.php', {
      method: "POST",
      header: {
        "content-type": "application/json"
      },
      body: JSON.stringify(data)
    })

    if (res.redirected) {
      window.location.href = res.url;
    } else {
      const response = await res.json();
      alert(response.message);
    }
  }
  catch (err) {
    alert(err.message);
  }
}
//IN MODIFICTION xhr -> fetch

//clear field after form submit
function clearfield(elements) {
  for (let i = 0; i < elements.length; i++) {
    elements.value = "";
  }
}

//show otp popup
function showPopup() {
  open = !open;
  document.querySelector('.backdrop1').classList.toggle('close-popup');
}

function showStatus(id, status, message) {
  const color = {
    'INFO': '#2196F3',
    'FAILED': '#f44336',
    'SUCCESS': '#4CAF50'
  }
  const el = document.querySelector(`#${id}`);
  el.innerHTML = `<span style="color:${color[status]}">${message}</span>`;
}
