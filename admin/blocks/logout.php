<?php
// ���� ������� �� ���������������� ���� �����
// ��������� ������
session_start();
// ���������� ���������� ����������
$_SESSION['users_login'];
session_destroy();

header('Location:../../index.php');