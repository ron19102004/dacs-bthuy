<?php
require($_SERVER['DOCUMENT_ROOT'] . "/helpers/env.php");
$url = ENV::getObjectArray('url') ?? 'http://localhost:3000/';
?>
<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">MingC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>
        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="<?php echo $url; ?>index.php" class="nav-link">Home</a></li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo $url; ?>views/pages/shop.php">Shop</a>
                </li>
                <li class="nav-item active"><a href="<?php echo $url; ?>views/pages/about.php" class="nav-link">About</a></li>
                <li class="nav-item"><a href="<?php echo $url; ?>views/pages/blog.php" class="nav-link">Blog</a></li>
                <li class="nav-item"><a href="<?php echo $url; ?>views/pages/contact.php" class="nav-link">Contact</a></li>
                <li class="nav-item cta cta-colored" id="cart_product">
                    <a href="<?php echo $url; ?>views/pages/cart.php" class="nav-link">
                        <span class="icon-shopping_cart"></span>
                        <span id="count_total_product">[0]</span>
                    </a>
                </li>
                <li class="nav-item" id="login-logout"></li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(() => {
        const username = localStorage.getItem('username') ?? null;
        const role = localStorage.getItem('role') ?? null;
        const url = localStorage.getItem('url') ?? null;
        if (role == 'admin') {
            window.location.href = `${url}views/pages/admin/home.php`;
        }
        if (username) {
            $('#login-logout').html(`<a href="${url}routes/logout.php" class="nav-link">Logout</a>`)
        } else $('#login-logout').html('<a href="<?php echo $url; ?>views/pages/login.php" class="nav-link">Login</a>')
        $.get('../../routes/cart.route.php', {
            method: 'count_total_product'
        }, (data) => {
            const resp = JSON.parse(data);
            let href = '';
            let click = ''
            if (resp.success) {
                href = '<?php echo $url; ?>views/pages/cart.php';
                id = '';
            } else {
                href = '#';
                click = 'onclick="cart_click()"';
            }
            const text = `<a href="${href}" ${click} class="nav-link" >
                        <span class="icon-shopping_cart"></span>
                        <span id="count_total_product">[${resp.data}]</span>
                      </a>`
            $('#cart_product').html(text)
        })

    })
    const cart_click = (e) => {
        alert('Vui lòng đăng nhập')
    }
</script>