

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
{{-- OWL CAROUSEL JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="  crossorigin="anonymous"></script>

<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 2
            },
            1000: {
                items: 3
            }
        }
    })
</script>

<script>
    $(document).ready(function(){
        $('.data-table').DataTable();
    });
</script>

<script>
    function formatDate(responseDate) {
        const date = new Date(responseDate);

        const monthNames = [
            'January', 'February', 'March', 'April', 'May', 'June',
            'July', 'August', 'September', 'October', 'November', 'December'
        ];

        const month = monthNames[date.getMonth()];
        const day = date.getDate();
        const year = date.getFullYear();

        const formattedDate = `${month} ${day}, ${year}`;
        return formattedDate;
    }

    function setImage(directory, imageresult){ //PWEDENG OPTIONAL NA TO SINCE PWEDE KA GUMAMIT NG ".attr()"
                var imageData = directory + imageresult;
                var imagePreviews = document.getElementsByClassName("imagepreview");
                for (var i = 0; i < imagePreviews.length; i++) {
                    imagePreviews[i].setAttribute("src", imageData);
                }
    }

    
</script>

<script>
    function addingimagepreview(element, img_id){
        var imageInput = document.getElementById(element.id);
         var inputimages = document.getElementById(img_id);
        var file = imageInput.files[0];
        var reader = new FileReader();
        
            reader.onloadend = function() {
                inputimages.innerHTML = '';
                inputimages.src = reader.result;
                inputimages.style = 'block';
        }
        
        if (file) {

            reader.readAsDataURL(file);
        } else {
            inputimages.src = "";
        }
       
}

</script>


</html>
