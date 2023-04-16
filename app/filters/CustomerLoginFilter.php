<?php
class CustomerLoginFilter extends Filter {
    public function doFilter() : void {
        if (!array_key_exists('userObj', $_SESSION)) {
            $this->redirect('/vexepro/app/views/Login.php');
        }
    }
}