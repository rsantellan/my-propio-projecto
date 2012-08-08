<?php
if($md_reserva->getApartamento()->getTipo() == "comission")
{
  echo round($md_reserva->getTotal() * 0.125, 2);
}
else
{
  echo round($md_reserva->getTotal() * 0.25, 2);
}

?>
