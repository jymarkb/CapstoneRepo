<?

function generateRandomView()
{
    $randViews =  rand(1001, 10000);
    $view = $randViews / 1000;

    return number_format($view, 1) . "k";
};

function generateRandomPercent()
{
    $temp = (rand(70, 90)) / 100;
    $percentage = $temp * 100;
    return $percentage . "%";
}
