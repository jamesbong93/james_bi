<?php
defined('BASEPATH') OR exit('No direct script access allowed');



?>
<!doctype html>
    <html>
        <head >
        <meta charset="<?php echo $charset; ?>">
        <title>HOME</title>
        <meta name="description" content="">
    </head>
    <body>
        <article>
            <h1>HOME</h1>
<?php if ($admin_link): ?>
            <p><a href="<?php echo site_url('admin'); ?>">Admin</a></p>
<?php endif; ?>

<?php if ($member_link): ?>
            <p><a href="<?php echo site_url('member'); ?>">Member</a></p>
<?php endif; ?>

<?php if ($senior_link): ?>
            <p><a href="<?php echo site_url('senior'); ?>">Senior</a></p>
<?php endif; ?>

<?php if ($logout_link): ?>
            <p><a href="<?php echo site_url('auth/logout/public'); ?>">Logout</a></p>
<?php else: ?>
            <p><a href="<?php echo site_url('auth/login'); ?>">Login</a></p>
<?php endif; ?>
        </article>

        <footer>

        </footer>
    </body>
</html>