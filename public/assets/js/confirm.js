function checkLink(num,type){
    if(type==='hapus'){
        // If btn is anchor
        let url = document.getElementById(`hapus-${num}`)
        let link = url.getAttribute('data-url')
        Swal.fire({
            title: 'Do you want to save the changes?',
            showDenyButton: true,
            confirmButtonText: `Hapus`,
            denyButtonText: `Batal`,
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.href = link
              return true;
            } else if (result.isDenied) {
              Swal.fire('Batal Hapus', '', 'info')
              return false;
            }
          })
    }
}

$('.hapus-confirm').on('click',function(e){
  let id = $(this).data('id')
  e.preventDefault();
  Swal.fire({
      title: 'Do you want to save the changes?',
      showDenyButton: true,
      confirmButtonText: `Hapus`,
      denyButtonText: `Batal`,
    }).then((result) => {
      if (result.isConfirmed) {
        $("#hapus-"+id).submit()
      } else if (result.isDenied) {
        Swal.fire('Batal Hapus', '', 'info')
        return false;
      }
    })
})