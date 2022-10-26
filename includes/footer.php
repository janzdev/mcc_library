<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(() => {
     "use strict";

     // Fetch all the forms we want to apply custom Bootstrap validation styles to
     const forms = document.querySelectorAll(".needs-validation");

     // Loop over them and prevent submission
     Array.from(forms).forEach((form) => {
          form.addEventListener(
               "submit",
               (event) => {
                    if (!form.checkValidity()) {
                         event.preventDefault();
                         event.stopPropagation();
                    }

                    form.classList.add("was-validated");
               },
               false
          );
     });
})();

(
     function() {

          'use strict';

          const elToggle = document.querySelector('.js-password-show-toggle'),
               passwordInput = document.getElementById('password');

          elToggle.addEventListener('click', (e) => {
               e.preventDefault();

               if (elToggle.classList.contains('active')) {
                    passwordInput.setAttribute('type', 'password');
                    elToggle.classList.remove('active');
               } else {
                    passwordInput.setAttribute('type', 'text');
                    elToggle.classList.add('active');
               }
          })

     }
)()
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
</script>
</body>

</html>