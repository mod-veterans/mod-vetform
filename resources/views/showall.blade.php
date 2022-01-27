
@include('framework.functions')
@php



$userID = $_SESSION['vets-user'];

$data = getData($userID);

$string = '';

function returnData($arr) {
   GLOBAL $string;

    foreach($arr as $k=>$v) {
        if (is_array($v)) {
           returnData($v);
        } else {
            $string .= '
##'.$k.'

'.$v.'


---

            ';
        }
    }
    return $string;
}


echo returnData($data);


@endphp
