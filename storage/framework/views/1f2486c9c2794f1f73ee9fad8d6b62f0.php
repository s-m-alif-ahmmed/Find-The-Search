<!-- Javascript Links -->
<script src="<?php echo e(asset('/frontend/assets/js/jquery-3.7.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('/frontend/assets/js/plugins.js')); ?>"></script>
<script src="<?php echo e(asset('/frontend/assets/js/skeletabs.js')); ?>"></script>
<script src="<?php echo e(asset('/frontend/assets/js/counto.min.js')); ?>"></script>

<script src="https://unpkg.com/lenis@1.1.16/dist/lenis.min.js"></script>

<!--  intl-tel-input JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
<script src="<?php echo e(asset('/frontend/assets/js/TimingFuntion.js')); ?>"></script>
<script src="<?php echo e(asset('/frontend/assets/js/main.js')); ?>"></script>

<!-- Include SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>


<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<script>
    // Toaster
    function showSuccessToast(message) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top", // top or bottom
            position: 'right', // left, center, or right
            backgroundColor: "#FD9325", // success color
            color: "#FFFFFF",
            stopOnFocus: true, // Prevents dismissing of toast on hover
            close: true, // Add a close button
        }).showToast();
    }

    function showErrorToast(message) {
        Toastify({
            text: message,
            duration: 3000,
            gravity: "top", // top or bottom
            position: 'right', // left, center, or right
            backgroundColor: "#FE0000", // error color
            color: "#FFFFFF",
            stopOnFocus: true, // Prevents dismissing of toast on hover
            close: true, // Add a close button
        }).showToast();
    }


<?php echo $__env->yieldPushContent('scripts'); ?>
<?php /**PATH C:\Users\HP\Herd\Softvence\Projects\david_heizt\resources\views/frontend/partials/scripts.blade.php ENDPATH**/ ?>