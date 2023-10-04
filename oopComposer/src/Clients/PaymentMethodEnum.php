<?php 
namespace HotelAbc\Clients;

enum PaymentMethodEnum : string
{
    case PayPal = "paypal";
    case CreditCard = "creditcard";
    case BankDeposit = "bankdeposit";
    case Cash = "cash";
}