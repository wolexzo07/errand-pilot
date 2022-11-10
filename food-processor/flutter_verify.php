<?php
//require "flutter2/setup.php";
include('flutter2/library/rave.php');
include('flutter2/library/raveEventHandlerInterface.php');
require("flutter2/library/AccountPayment.php");
require("flutter2/library/CardPayment.php");
require("flutter2/library/MobileMoney.php");
require("flutter2/library/Ussd.php");
require("flutter2/library/Mpesa.php");
require("flutter2/library/Transfer.php");
require("flutter2/library/AchPayment.php");
require("flutter2/library/VirtualCards.php");
require("flutter2/library/Bvn.php");
require("flutter2/library/PaymentPlan.php");
require("flutter2/library/Subaccount.php");
require("flutter2/library/Recipient.php");
require("flutter2/library/Subscription.php");
require("flutter2/library/Bill.php");
require("flutter2/library/Ebill.php");
require("flutter2/library/VirtualAccount.php");
require("flutter2/library/TokenizedCharge.php");
require("flutter2/library/Transactions.php");
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Transactions;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\TokenizedCharge;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\VirtualAccount;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Ebill;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Bill;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Subscription;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Recipient;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Subaccount;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\PaymentPlan;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Bvn;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\VirtualCard;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\AchPayment;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Transfer;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Mpesa;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Ussd;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\MobileMoney;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\CardPayment;
use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\AccountPayment;

use Flutterwave\EventHandlers\EventHandlers\EventHandlers\EventHandlers\EventHandlers\Rave;

$flw = new \Flutterwave\Rave(getenv('FLW_SECRET_KEY')); // Set `PUBLIC_KEY` as an environment variable
$transactions = new \Flutterwave\Transactions();
$response = $transactions->verifyTransaction(['id' => $transactionId]);
if (
    $response['data']['status'] === "successful"
    && $response['data']['amount'] === $expectedAmount
    && $response['data']['currency'] === $expectedCurrency) {
    // Success! Confirm the customer's payment
} else {
    // Inform the customer their payment was unsuccessful
}
?>