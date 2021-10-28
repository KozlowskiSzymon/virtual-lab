<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" style="margin-left: 20px;" href="#">Virtual Lab</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav"  style="margin-left: auto" >
            <a class="nav-item nav-link active" href="{{'/'}}">Home</a>
            <?php if(Session()->has('loginId') && Session()->get('role') == 'ADMIN') {?>
            <a class="nav-item nav-link" href="{{'/register'}}">Users</a>
            <?php }else{} ?>
            <?php if(Session()->has('loginId') && Session()->get('role') == 'ADMIN') {?>
            <a class="nav-item nav-link" href="{{'/items'}}">Items</a>
            <?php }else{} ?>
            <?php if(Session()->has('loginId') && Session()->get('role') == 'ADMIN') {?>
            <a class="nav-item nav-link" href="{{'/keywords'}}">Keywords</a>
            <?php }else{} ?>
            <?php if(Session()->has('loginId')) {?>
            <a class="nav-item nav-link" href="{{'/profile'}}">Profile</a>
            <?php }else{} ?>
            <?php if(Session()->has('loginId')) {?>
            <a class="nav-item nav-link" href="{{'/logout'}}">Logout</a>
            <?php }else{ ?>
            <a class="nav-item nav-link" href="{{'/login'}}">Login</a>
            <?php } ?>
        </div>
    </div>
</nav>

