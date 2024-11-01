     <?php $__env->slot('header', null, []); ?> 
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            <?php echo e(__('Dashboard')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    

    <?php $__env->startSection('content'); ?>
    <main style="height: 75vh;
    align-items: center;
    display: flex;">
        <div class="container mx-auto mt-5">
                <h1 class="text-2xl font-semibold titleDashboard">Entre na tabela da floricultura <br> para poder visualiza-la e edita-la</h1>

                <div class="mt-5 algDash">
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary mr-2 btnDash">Floricultura<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
        viewBox="0 0 430.119 430.119" style="enable-background:new 0 0 430.119 430.119;" xml:space="preserve" width="70" height="70">
    <g>
        <g>
            <path fill="#fff" d="M428.923,205.956c-4-24.667-19.332-40.333-46-47c-33.332-8-74.666,2-124,30
                c62-35.333,92.334-73,91-113c0-24.667-11-41.667-33-51c-24.666-10.667-47.334-4.667-68,18c-22.668,24.667-34,65-34,121
                c0-72-17.667-117.333-53-136c-22.667-12.667-43.667-10.667-63,6c-21.333,18-25.667,42-13,72s41,57.667,85,83
                c-61.333-35.334-109-42.668-143-22c-22,13.333-31,32-27,56c3.333,24.667,18.333,40.667,45,48c33.333,8.667,75-1.333,125-30
                c-62,36-92.333,74-91,114c1.333,24.667,13.333,41.667,36,51c25.333,10,48,3,68-21c11.333-14,19.333-32.667,24-56h13
                c9.334,46,29.666,72.333,61,79c23.334,5.333,42-1.667,56-21c18.668-25.333,16-54.333-8-87c-16-21.333-39.666-41-71-59
                c61.334,35.334,109,42.667,143,22C424.591,249.623,433.591,230.623,428.923,205.956z M234.423,234.456
                c-5.666,5.667-12.166,8.5-19.5,8.5s-13.668-2.833-19-8.5c-5.333-5.667-8-12.167-8-19.5s2.667-13.667,8-19s11.667-8,19-8
                s13.833,2.667,19.5,8c5.668,5.334,8.5,11.668,8.5,19C242.923,222.289,240.091,228.789,234.423,234.456z"/>
        </g>
    </g>
    </svg></a>
                    <!-- <a href="<?php echo e(route('categories.index')); ?>" class="btn btn-secondary">Gerenciar Categorias</a> -->
                </div>
            </div>
</main>
        
    <?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pichau\Desktop\projetos\tpaProjetoFinal\projetoFinal\resources\views/dashboard.blade.php ENDPATH**/ ?>