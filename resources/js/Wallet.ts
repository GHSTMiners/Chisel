import $ from "jquery";
import Cookies from 'js-cookie'


class Wallet {
    constructor(parameters) {
        
    }

    /**
     * hasCookie Checks if there is already an wallet authetication token set
     */
    public authenticated(wallet_address :) : boolean {
        return Cookies.get('wallet_auth_token') !== undefined;
    }
}