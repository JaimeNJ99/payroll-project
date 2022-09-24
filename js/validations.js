const username = document.getElementById("username");
const password = document.getElementById("password");

const validation = () => {
    if( username.value === "" || password.value === "" ){
        Swal.fire(
            'Error',
            'Username or password can not be empty!',
            'error'
        )
        return false;
    }
    return true;
}