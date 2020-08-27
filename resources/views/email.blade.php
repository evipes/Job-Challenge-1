<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Daniel Lucas</title>
</head>
<body>
    <style>
    /* Shrink Wrap Layout Pattern CSS */
    @media only screen and (max-width: 599px) {
        td[class="hero"] img {
            width: 100%;
            height: auto !important;
        }
        td[class="pattern"] td{
            width: 100%;
        }
    }
</style>

<table cellpadding="0" cellspacing="0">
    <tr>
        <td class="pattern" width="600">
            <table cellpadding="0" cellspacing="0">
                <tr>
                    <td class="hero" align="center">
                        
                    </td>
                </tr>
                <tr>
                    <td align="center" style="font-family: arial,sans-serif; color: #333;">
                        <h1></h1>
                    </td>
                </tr>
                <tr>
                    <td style="font-family: arial,sans-serif; line-height: 20px !important; color: #666; padding-bottom: 20px;">                       
                        <p>{{$msg}}</p>
                        <br>
                    </td>
                </tr>
                <tr>
                    <td align="center" style="display: block; border: 0; height: 50px; background: #483D8B; color: #fff">
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>