<!DOCTYPE html>
<html lang="eu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>access logs</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <style>
        header{
            background-color: #212529;
        }
        body{
            font-size: 13.5px;
        }        
    </style>
</head>
<body>
    <header class="site-header sticky-top py-1">
        <div class="container d-flex flex-column flex-lg-row justify-content-between">
        <a class="py-2 align-self-center" href="/" aria-label="Product">
        <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mx-auto" role="img" viewBox="0 0 24 24" focusable="false"><title>Product</title><circle cx="12" cy="12" r="10"></circle><path d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94"></path></svg></a>
        <a class="py-2 d-none d-md-inline-block btn btn-info align-self-center" href="/">Views all</a>
        <a class="py-2 d-none d-md-inline-block btn btn-info align-self-center" href="/group_by_ip">Group by IP</a>
        <a class="py-2 d-none d-md-inline-block btn btn-info align-self-center" href="/group_by_date">Group by DATE</a>
        <form action="/select_date" class= "py-2 d-none d-md-inline-block align-self-center" method="post">
            <?php echo csrf_field(); ?>
            <p class="py-2 d-md-inline-block text-white align-self-center">Date 1: </p>
            <input type="date" class="d-md-inline-block align-self-center" name="date1">
            <p class="py-2  d-md-inline-block text-white align-self-center">Date 2: </p>
            <input type="date" class="d-md-inline-block align-self-center"  name="date2">
            <input type="submit" class="btn btn-info py-2 d-none d-md-inline-block align-self-center" value="Select date">
        </form>
    </div>
    </header>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">ip</th>
                <th scope="col">identity</th>
                <th scope="col">user</th>
                <th scope="col">date</th>
                <th scope="col">time</th>
                <th scope="col">timezone</th>
                <th scope="col">method</th>
                <th scope="col">path</th>
                <th scope="col">protocol</th>
                <th scope="col">status</th>
                <th scope="col">bytes</th>
                <th scope="col">referer</th>
                <th scope="col">agent</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $__env->yieldContent('content'); ?>                 
        </tbody>
    </table>
</body>
</html><?php /**PATH C:\nginx-1.19.6\html\laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>