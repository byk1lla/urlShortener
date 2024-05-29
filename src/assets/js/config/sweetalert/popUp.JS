
const swalTailwind = Swal.mixin({
  customClass: {
    confirmButton: "transition-all delay-5 ease-in-out text-white bg-green-700 hover:bg-green-900 focus:outline-none font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800",
    cancelButton: "transition-all delay-5 ease-in-out text-white bg-red-700 hover:bg-red-800 focus:outline-none hover:bg-red-900 rounded-full  font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-700 dark:hover:bg-red-800 "
  },
  buttonsStyling: false
});

function popUp(title,message,status){
  swalTailwind.fire({
    title: title,
    icon: status,
    html: message,
    confirmButtonText:'Tamam',
  
  })
}
function popUpwPos(position,title,message,status){
  swalTailwind.fire({
    position:position,
    width:400,
    title: title,
    icon: status,
    html: message,
    showConfirmButton:false,
    timer:1500
  })
}

function showError(title,message){
  swalTailwind.fire({
    title: title,
    icon: 'error',
    html: message,
    showCancelButton: true,
    confirmButtonText:'Tamam',
    cancelButtonText:'Kapat',
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
  })
}

function question(title, message) {
  return new Promise((resolve) => {
    swalTailwind.fire({
      title: title,
      text: message,
      icon: 'question',
      showCancelButton: true,
      confirmButtonText: 'Evet',
      cancelButtonText: 'Hayır',
    }).then((result) => {
      if (result.isConfirmed) {
        
        resolve(true);
      } else if (result.dismiss === Swal.DismissReason.cancel) {
        
        resolve(false);
      }
    });
  });
}
