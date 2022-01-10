
@include('framework.functions')
@php



$userID = $_SESSION['vets-user'];

$data = getData($userID);


echo '<pre>';
print_r ($data);
echo '</pre>';

@endphp
