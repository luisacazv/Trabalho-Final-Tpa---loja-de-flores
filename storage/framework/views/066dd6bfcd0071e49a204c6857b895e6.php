

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-5">
        <span class="align">
            <h1 class="text-2xl font-semibold">Editar Produto</h1>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary mb-3 btn2">Voltar para Produtos</a>
        </span>
        

        <form action="<?php echo e(route('products.update', $product)); ?>" method="POST" enctype="multipart/form-data" class="mt-4">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PATCH'); ?>
            
            <div>
                <label for="name" class="block">Nome:</label>
                <input type="text" name="name" id="name" value="<?php echo e(old('name', $product->name)); ?>" required class="border rounded w-full py-2 px-3 mt-1">
            </div>

            <div class="mt-4">
                <label for="price" class="block">Preço:</label>
                <input type="number" name="price" id="price" value="<?php echo e(old('price', $product->price)); ?>" required class="border rounded w-full py-2 px-3 mt-1" step="0.01">
            </div>

            <div class="mt-4">
                <label for="description" class="block">Descrição:</label>
                <textarea name="description" id="description" class="border rounded w-full py-2 px-3 mt-1"><?php echo e(old('description', $product->description)); ?></textarea>
            </div>

            <div class="mt-4">
                <label for="stock" class="block">Estoque:</label>
                <input type="number" name="stock" id="stock" value="<?php echo e(old('stock', $product->stock)); ?>" required class="border rounded w-full py-2 px-3 mt-1">
            </div>

            <div class="mt-4">
                <label for="color" class="block">Cor:</label>
                <input type="text" name="color" id="color" value="<?php echo e(old('color', $product->color)); ?>" class="border rounded w-full py-2 px-3 mt-1">
            </div>

            <div class="mt-4">
                <label for="size" class="block">Tamanho:</label>
                <input type="text" name="size" id="size" value="<?php echo e(old('size', $product->size)); ?>" class="border rounded w-full py-2 px-3 mt-1">
            </div>

            <div class="mt-4">
                <label for="image" class="block">Imagem:</label>
                <input type="file" name="image" id="image" class="border rounded w-full py-2 px-3 mt-1">
                <?php if($product->image): ?>
                    <p class="mt-2">Imagem atual:</p>
                    <img src="<?php echo e(asset('images/' . $product->image)); ?>" alt="<?php echo e($product->name); ?>" width="50">
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary mt-4 btn2">Atualizar Produto</button>
            <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary mt-4 ml-2 red">Cancelar</a>
        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Pichau\Desktop\projetos\tpaProjetoFinal\projetoFinal\resources\views/products/edit.blade.php ENDPATH**/ ?>