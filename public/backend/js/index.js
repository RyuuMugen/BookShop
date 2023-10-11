
const toggleButton = document.getElementById('toggleButton');
const contentDiv = document.getElementById('navbarSupportedContent');


let isHidden = false;

function toggleDisplay() {
  if (isHidden) {
    contentDiv.style.cssText = 'display: block !important';
    isHidden = false;
  } else {
    contentDiv.style.cssText = 'display: none !important';
    isHidden = true;
  }
}
toggleButton.addEventListener('click', toggleDisplay);


  ClassicEditor
  .create(document.querySelector('#editor'), {

  })
  .catch(error => {
      console.log(error);
  });

  function actionChange(a, i) {

    var r = confirm(a);
    if (r == true) {
        window.location.href = i;
    }
}



const toggleButton2 = document.getElementById('toggleButton2');
const contentDiv2 = document.getElementById('contentDiv2');
const contentDiv3 = document.getElementById('contentDiv3');

// Biến để theo dõi trạng thái hiện tại của div
let isHidden2 = false;

// Định nghĩa hàm để thay đổi trạng thái display của div
function toggleDisplay2() {
  if (isHidden2) {
    contentDiv2.style.cssText = 'display: block !important';
    contentDiv3.classList.remove('col-12');
    contentDiv3.classList.add('col-10');
    isHidden2 = false;
  } else {
    contentDiv2.style.cssText = 'display: none !important';
    contentDiv3.classList.add('col-12');
    contentDiv3.classList.remove('col-10');
    isHidden2 = true;
  }
}

// Gắn sự kiện click cho nút
toggleButton2.addEventListener('click', toggleDisplay2);
