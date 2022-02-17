@include('framework.functions')
@php


//error handling setup
$errorWhoLabel = '';
$errorMessage = '';
$errorWhoShow = '';
$errors = 'N';
$errorsList = array();


//set fields
$diffuse2014 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$diffuse2008 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');
$worker1979 = array('data'=>'', 'error'=>'', 'errorLabel'=>'');



//load in our content
$userID = $_SESSION['vets-user'];
$data = getData($userID);




if (empty($_POST)) {
    //load the data if set
    if (!empty($data['sections']['other-benefits']['details'])) {

        $diffuse2014['data']           = @$data['sections']['other-benefits']['details']['diffuse2014'];
        $diffuse2008['data']           = @$data['sections']['other-benefits']['details']['diffuse2008'];
        $worker1979['data']            = @$data['sections']['other-benefits']['details']['worker1979'];


    }
} else {
//var_dump($_POST);
//die;
}


if (!empty($_POST)) {


    //set the entered field names

    $diffuse2014['data'] = cleanTextData($_POST['/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme']);
    $diffuse2008['data'] = cleanTextData($_POST['/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme']);
    $worker1979['data'] = cleanTextData($_POST['/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act']);



    if (empty($_POST['/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme'])) {

        $data['sections']['other-benefits']['details']['diffuse2014'] = '';
    } else {
        $data['sections']['other-benefits']['details']['diffuse2014'] = cleanTextData($_POST['/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme']);
    }


    if (empty($_POST['/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme'])) {

        $data['sections']['other-benefits']['details']['diffuse2008'] = '';
    } else {
        $data['sections']['other-benefits']['details']['diffuse2008'] = cleanTextData($_POST['/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme']);
    }

    if (empty($_POST['/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act'])) {
        $data['sections']['other-benefits']['details']['worker1979'] = '';

    } else {
        $data['sections']['other-benefits']['details']['worker1979'] = cleanTextData($_POST['/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act']);
    }





    if ($errors == 'Y') {

        $errorList = '';
        foreach ($errorsList as $error) {
            $errorList .=  '<li>'.$error.'</li>';
        }


        $errorMessage = '
         <div class="govuk-error-summary" aria-labelledby="error-summary-title" role="alert" tabindex="-1" data-module="govuk-error-summary">
          <h2 class="govuk-error-summary__title" id="error-summary-title">
            There is a problem
          </h2>
          <div class="govuk-error-summary__body">
            <ul class="govuk-list govuk-error-summary__list">
            '.$errorList.'
            </ul>
          </div>
        </div>
        ';







    } else {

        //store our changes

        storeData($userID,$data);

        $theURL = '/applicant/other-details/benefits/check-answers';
        if (!empty($_GET['return'])) {
            if ($rURL = cleanURL($_GET['return'])) {
                $theURL = $rURL;
            }
        }

        header("Location: ".$theURL);
        die();

    }

}

@endphp



@include('framework.header')



    @include('framework.backbutton')

    <main class="govuk-main-wrapper govuk-main-wrapper--auto-spacing" id="main-content" role="main">
        <div class="govuk-grid-row">
            <div class="govuk-grid-column-two-thirds">
                                <h1 class="govuk-heading-xl">What was the date you received payment and the amount?</h1>
                                <form method="post" enctype="multipart/form-data" novalidate>
                                @csrf
                                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme">
        Diffuse Mesothelioma 2014 Scheme
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme" name="/other-benefits/other-payment-dates/diffuse-mesothelioma-2014-scheme" type="text" maxlength="100"
                   value="{{$diffuse2014['data']}}"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme">
        Diffuse Mesothelioma 2008 Scheme
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme" name="/other-benefits/other-payment-dates/diffuse-mesothelioma-2008-scheme" type="text" maxlength="100"
                   value="{{$diffuse2008['data']}}"
            >
</div>
                                    <div class="govuk-form-group ">
    <label class="govuk-label" for="/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act">
        The Workers Compensation 1979 Pneumoconiosis Act
    </label>
            <input
        class="govuk-input govuk-!-width-two-thirds "
        id="/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act" name="/other-benefits/other-payment-dates/the-workers-compensation-1979-pneumoconiosis-act" type="text"
                   value="{{$worker1979['data']}}" maxlength="100"
            >
</div>



                <div class="govuk-form-group">
    <button class="govuk-button govuk-!-margin-right-2" data-module="govuk-button">Save and continue</button>
            <br><a href="/cancel" class="govuk-link"
           data-module="govuk-button">
            Cancel application
        </a>

    </div>
            </form>
            </div>
        </div>
    </main>
</div>




@include('framework.footer')
