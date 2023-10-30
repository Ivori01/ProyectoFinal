<!DOCTYPE html>
<html>

<body>
    <table style="border-bottom: 1px solid black; width: 100%">
        <tr>
            <td class="section" style="text-align:left">
                <img src="{{url(Storage::url('sistem/photos/' . $school_info->logo_i)) }}" style="width:50%;"
                    height="80" width="180">
            </td>
            <td style="text-align:right">
                <img src="{{url(Storage::url('sistem/photos/' . $school_info->logo_d))}} " style="width:50%;" height="80">
            </td>
        </tr>
    </table>
</body>

</html>
