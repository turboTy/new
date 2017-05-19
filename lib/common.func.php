<?php
function alertMes($mes,$url){
    echo "<script language='javascript'>alert('{$mes}');</script>";
    echo "<script language='javascript'>window.location='{$url}';</script>";
}