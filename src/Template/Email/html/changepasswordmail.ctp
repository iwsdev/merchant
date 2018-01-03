<?php
/*
 * Developer - Jai Singh Patel
 * Date : 24 April, 2017
 * Project :ICT
 * File Name : forgetpasswordemail.ctp
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
    </head>

    <body>
        Dear <?php echo $name; ?>,
                        <p>Your password has been changed. You can now login using below password.
                        </p>
                    
                        <table>
                            <tr>
                                <th style='float:left;'>Username: </th>
                                <td style='float:left;'><?php echo $userName ?></td>
                            </tr>
                            <tr>
                                <th style='float:left;'>Password: </th> 
                                <td style='float:left;'><?php echo $pass;?></td>
                            </tr>
                        </table>
                        <p style='margin:1px;'>Best Regards,</p>
                        <?php echo ictTeam ?>
        </body>
</html>
