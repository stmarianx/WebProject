<?php
 class UserView{
    function signup_form()
    {
        include '../html/signup.html';
    } 
    function succes()
    {
        include '../html/utilizator_logat.html';
    }
    function fail($error="")
    {
        include '../html/log.html';
    }
    function main_page()
    {
        include '../html/index.html';
    }
}
