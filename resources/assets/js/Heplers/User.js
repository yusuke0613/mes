import Token from "./Token";
import AppStorage from "./AppStorage";

class User {
    login(data) {
        axios.post('/api/auth/login', data)
        .then(res => this.responseAfterLogin(res))
        .catch(error => console.log(error.response.data))
    }  

    responseAfterLogin(res) {
        const access_token = res.data.access_token
        const username = res.data.user
        if (Token.isValid(access_token)) {
            AppStorage.store(username, access_token)
            window.location = '/'
        }
    }

    hasToken() {
        const storedToken = AppStorage.getToken();
        if (storedToken) {
            return Token.isValid(storedToken) ? true : false
        }

        return false
    }

    loggedIn() {
        return this.hasToken()
        
    }

    logout() {
        AppStorage.clear()
        window.location = '/'
    }

    name() {
        if(this.loggedIn()) {
            return AppStorage.getUser()
        }
    }

    id() {
        if(this.loggedIn()) {
            const payload = Token.payload(AppStorage.getToken())
            return payload.sub
        }
    }

    own(id) {
        return this.id() == id 
    }
}

export default User = new User();