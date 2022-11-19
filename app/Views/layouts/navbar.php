<div class="menu">
    <nav>
        <ul class="left">
            <li style="background-color:<?php echo @$_GET['url']==='Home/index'?'#198754':''?>"><a  href="<?php echo finalRoot  ?>/Home/index">home</a></li>
            <li style="background-color:<?php echo @$_GET['url']==='Services/index'?'#198754':''?>"><a href="<?php echo finalRoot ?>/Services/index">service</a></li>
            <li style="background-color:<?php echo @$_GET['url']==='Categories/index'?'#198754':''?>"><a href="<?php echo finalRoot ?>/Categories/index">category</a></li>
            <li style="background-color:<?php echo @$_GET['url']==='Products/index'?'#198754':''?>"><a href="<?php echo finalRoot ?>/Products/index">products</a></li>
            <li style="background-color:<?php echo @$_GET['url']==='Teams/index'?'#198754':''?>"><a href="<?php echo finalRoot ?>/Teams/index">team</a></li>
            <li style="background-color:<?php echo @$_GET['url']==='Questions/index'?'#198754':''?>"><a href="<?php echo finalRoot ?>/Questions/index">f.a.q</a></li>
        </ul>
        <ul class="right">
            <li style="background-color:<?php echo @$_GET['url']==='Auths/register'?'#198754':''?>">
                <a href="<?php echo finalRoot ?>/Auths/register">register</a>
            </li>
            <li style="background-color:<?php echo @$_GET['url']==='Auths/login'?'#198754':''?>">
                <a href="<?php echo finalRoot ?>/Auths/login">login</a>
            </li>
        </ul>
    </nav>
</div>
<div class="menuHamburger">
    <label class="open" for="open"><i class="fa fa-bars"></i></label>
    <label class="close" for="close">&times;</label>
    <input class="open" type="radio" name="menu" id="open">
    <input class="close" type="radio" name="menu" id="close">
        <ul class="itemHamburger">
            <li><a href="<?php echo finalRoot  ?>/Home/index">home</a></li>
            <li><a href="<?php echo finalRoot ?>/Services/index">service</a></li>
            <li><a href="<?php echo finalRoot ?>/Categories/index">category</a></li>
            <li><a href="<?php echo finalRoot ?>/Products/index">products</a></li>
            <li><a href="<?php echo finalRoot ?>/Teams/index">team</a></li>
            <li><a href="<?php echo finalRoot ?>/Questions/index">f.a.q</a></li>
        </ul>
</div>
