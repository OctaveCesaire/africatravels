<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Mon Tableau de Bord</h1>
    <h3>Mes Transactions</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID Transaction</th>
                <th>Montant</th>
                <th>Statut</th>
                <th>Date</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($transaction->id); ?></td>
                    <td><?php echo e(number_format($transaction->amount, 2)); ?> USD</td>
                    <td><?php echo e($transaction->status); ?></td>
                    <td><?php echo e($transaction->created_at->format('d-m-Y H:i')); ?></td>
                    <td><?php echo e($transaction->description); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <?php echo e($transactions->links()); ?>

</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/vortex/Public/elites/afric/resources/views/dashboard/user.blade.php ENDPATH**/ ?>