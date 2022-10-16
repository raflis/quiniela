<style type="text/css">
	.mayuscula{
		text-transform: uppercase;
	}
.a3s{ font: unset !important}
.g6{ font: unset !important}
   @media screen and (max-device-width: 580px), screen and (max-width: 580px) {
   table[class="Contenedor"] {
   width: 100% !important;
   border: 0 !important;
   align: center !important;
   text-align: center !important;
   }
   table[class="Contenido"] {
   width: 90% !important;
   border: 0 !important;
   align: center !important;
   text-align: center !important;
   }
   table[class="Contenido2"] {
   width: 100% !important;
   border: 0 !important;
   align: center !important;
   text-align: center !important;
   }
   img[class="Imagen"] {
   width: 100% !important;
   }
   }
   img[class="Imagen2"] {
   width: 50% !important;
   }
   td[class="Center"] {
   align: center !important;
   text-align: center !important;
   }
   td[class="Titulo"] {
   font-size: 14px !important;
   border: 0 !important;
   }
   td[class="Titulo2"] {
   font-size: 9px !important;
   border: 0 !important;
   }
   .nombre{
   font-size: 22px !important;
   }
   .mensaje{
   font-size: 18px !important;  
   }
   .ftext{
   font-size: 12px !important; 
   }
   }
   @media screen and (max-device-width: 380px), screen and (max-width: 380px) {
   .nombre{
   font-size: 15px !important;
   }
   .mensaje{
   font-size: 16px !important; 
   }
   .ftext{
   font-size: 10px !important; 
   }
   }
</style>
<table align="center" cellpadding="0" cellspacing="0" border="0" class="Contenedor" style="width: 100%;">
<tbody>
<tr>
  <td align="center" style="padding: 0px; margin: 0px; border: 0px; background-color: #f2f2f2; width: 100%;">
  <table border="0" align="center" cellpadding="0" cellspacing="0" style="width: 650px; margin-left: auto; margin-right: auto;">
  <tbody>
  <tr>
  <td align="center" style="padding: 0px; margin: 0px; border: 0px; background-color: #ffffff; width: 650px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tbody>
      <tr>
        <td colspan="4" align="center" valign="top">&nbsp;</td>
      </tr>
      <tr>
        <td height="83" colspan="4" align="center" valign="middle" bgcolor="#009640"><img src="https://brisas.dennisormeno.com/images/logo.png" width="262" height="67" alt=""/></td>
        </tr>
      <tr>
        <td width="4%" height="18">&nbsp;</td>
        <td width="26%">&nbsp;</td>
        <td width="67%">&nbsp;</td>
        <td width="3%">&nbsp;</td>
      </tr>
      <tr>
        <td height="18">&nbsp;</td>
        <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td>
              
              <p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 18px; color: #000; line-height: 20px; font-weight: bold; text-align: center; margin: 0">
                
                Hola {{ $user_name }} {{ $user_lastname }}
                
                </p>
              
              </td>
            </tr>
          <tr>
            <td></td>
            </tr>
          <tr>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td>
			  <p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 17px; color: #000; line-height: 20px; font-weight: regular; text-align: center; margin: 0">
                
                Gracias por tu compra
                
                </p>
			  </td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            </tr>
          <tr>
            <td>
              <p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 15px; color: #000; line-height: 20px; font-weight: regular; text-align: left; margin: 0">
                
                Tu pedido ha sido confirmado.<br>
Los detalles de tu pedido se muestran a continuación
                
                </p>
              </td>
            </tr>
          <tbody>
            </tbody>
          </table></td>
        <td align="right">&nbsp;</td>
      </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2">&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
        <tr>
          <td>&nbsp;</td>
          <td colspan="2" style="border-top:1px dashed #061D38">&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 15px; color: #000; line-height: 20px; font-weight: bold; text-align: center; margin: 0">
                
                Detalles del pedido
                
                </p></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2">&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tbody>
		      <tr>
		        <td width="49%"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #000; line-height: 20px; font-weight: normal; text-align: left; margin: 0; font-style: italic;">
                
                Número de pedido: {{ $purchase_number }}
                
                </p></td>
		        <td width="51%"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #000; line-height: 20px; font-weight: normal; text-align: right; margin: 0; font-style: italic;">
                
                Fecha del pedido: {{ ucfirst(\Carbon\Carbon::parse($transaction_date)->formatLocalized('%A, %d de %B %Y')) }}
                
                </p></td>
		        </tr>
		      </tbody>
		    </table></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2">&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tbody>
		      <tr>
		        <td colspan="2" style="border-top: 2px solid #061D38; border-bottom: 2px solid #061D38"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 14px; color: #000; line-height: 20px; font-weight: bold; text-align: left; margin: 0; padding-left: 7px">
		          
		          Taller
		          
		          </p></td>
		        <td width="6%" style="border-top: 2px solid #061D38; border-bottom: 2px solid #061D38">&nbsp;</td>
		        <td width="19%" style="border-top: 2px solid #061D38; border-bottom: 2px solid #061D38"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 14px; color: #000; line-height: 20px; font-weight: bold; text-align: right; margin: 0">
                
                Precio
                
                </p></td>
		        </tr>
		      <tr>
		        <td width="12%" bgcolor="#EFF0F4">&nbsp;</td>
		        <td width="63%" bgcolor="#EFF0F4">&nbsp;</td>
		        <td bgcolor="#EFF0F4">&nbsp;</td>
		        <td bgcolor="#EFF0F4">&nbsp;</td>
		        </tr>
           @foreach($detail as $id => $details)
		      <tr>
		        <td align="center" bgcolor="#EFF0F4"><img src="{{ str_replace(' ', '%20', $details['image']) }}" width="55" height="54" alt=""/></td>
		        <td bgcolor="#EFF0F4"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 14px; color: #000; line-height: 20px; font-weight: normal; text-align: left; margin: 0">
                
                {{ $details['name'] }}
                
                </p></td>
		        <td bgcolor="#EFF0F4">&nbsp;</td>
		        <td bgcolor="#EFF0F4"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 14px; color: #000; line-height: 20px; font-weight: normal; text-align: right; margin: 0">
                

              {{ $details['price'] }} PEN
                
                </p></td>
		        </tr>
            
            @endforeach
            <tr>
		        <td colspan="2" bgcolor="#EFF0F4"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 14px; color: #000; line-height: 20px; font-weight: bold; text-align: right; margin: 0">
		          
		          Total
		          
		          </p></td>
		        <td bgcolor="#EFF0F4">&nbsp;</td>
		        <td bgcolor="#EFF0F4"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 14px; color: #000; line-height: 20px; font-weight: normal; text-align: right; margin: 0">
                
                {{ $amount }} {{ $currency }}
                
                </p>
            </td>
		      </tr>
          
		      <tr>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		        </tr>
		      <tr>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		        <td>&nbsp;</td>
		        </tr>
		      </tbody>
		    </table></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2">&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2" style="border-top:1px dashed #061D38">&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="0">
		    <tbody>
		      <tr>
		        <td colspan="2"><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: bold; text-align: left; margin: 0;padding-left:8px">
		          
		          Datos de facturación
		          
		          </p></td>
		        </tr>
		      <tr>
		        <td width="11%">&nbsp;</td>
		        <td width="89%">&nbsp;</td>
		        </tr>
		      <tr>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px">
		          Nombres:
		          </p></td>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px">
		          {{ $user_name }} {{ $user_lastname }}
		          </p></td>
		        </tr>
		      <tr>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> Documento: </p></td>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> {{ $user_document }}</p></td>
		        </tr>
		      <tr>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> Teléfono: </p></td>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> {{ $user_telephone }}</p></td>
		        </tr>
		      <tr>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> Email: </p></td>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> {{ $user_email }}</p></td>
		        </tr>
		      <tr>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> Dirección: </p></td>
		        <td><p style="font-family: Segoe, 'Segoe UI', 'DejaVu Sans', 'Trebuchet MS', Verdana, sans-serif; font-size: 13px; color: #061d38; line-height: 20px; font-weight: normal; text-align: left; margin: 0;padding-left: 8px"> {{ $user_address }}</p></td>
		        </tr>
		      </tbody>
		    </table></td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td>&nbsp;</td>
		  <td colspan="2">&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
		<tr>
		  <td height="47" colspan="4" bgcolor="#009640">&nbsp;</td>
		  </tr>
		</tbody>
  </table></td>
  </tr>
  </tbody>
  </table>
  </td>
</tr>
</tbody>
</table>
