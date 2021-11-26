
<html>
<head>
    <title>Link Hasher</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">
    <h1>Link  hasher</h1>
   
    <div class="card">
      <div class="card-header">
        <form method="POST" action="<?php echo e(route('generate.shorten.link.post')); ?>">
            <?php echo csrf_field(); ?>
            <div class="input-group mb-3">
              <input type="text" name="link" class="form-control" placeholder="Enter URL" aria-label="Recipient's username" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-success" type="submit">Generate Shorten Link</button>
              </div>
            </div>
        </form>
      </div>
      <div class="card-body">
   
            <?php if(Session::has('success')): ?>
                <div class="alert alert-success">
                    <p><?php echo e(Session::get('success')); ?></p>
                </div>
            <?php endif; ?>
   
            <table class="table table-bordered table-sm">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $shortLinks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($row->id); ?></td>
                            <td><a href="<?php echo e(route('shorten.link', $row->code)); ?>" target="_blank"><?php echo e(route('shorten.link', $row->code)); ?></a></td>
                            <td><?php echo e($row->link); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
      </div>
    </div>
   
</div>
    
</body>
</html><?php /**PATH /home/elonkush/hashlink/resources/views/shortenLink.blade.php ENDPATH**/ ?>