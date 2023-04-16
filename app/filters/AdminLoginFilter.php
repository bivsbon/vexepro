<?php
class AdminLoginFilter extends Filter
{
    public function doFilter(): void
    {
        if (!array_key_exists('adminObj', $_SESSION)) {
            $this->redirect('/vexepro/app/views/Login.php');
        }
    }
}