function cambiar(mail) {
    if (window.confirm("¿Seguro que quieres cambiar el estado a este usuario?")) {
        location.href='../php/ChangeUserState.php?email='+mail;
    }
}
function eliminar(mail) {
  if (window.confirm("¿Seguro que quieres eliminar este usuario?")) {
    location.href='../php/RemoveUser.php?email='+mail;
}

}

