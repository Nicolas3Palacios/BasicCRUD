export default {
    data:{
        username:null,
        email:null
    },
    initialize(){
        this.data.username = localStorage.getItem('username')
        this.data.email = localStorage.getItem('email')
    },
    set(email, username ){
        localStorage.setItem('username', username)
        localStorage.setItem('email', email)
        this.initialize()
    },
    remove(){
        localStorage.removeItem('username')
        localStorage.removeItem('email')
        this.initialize()
    }
}