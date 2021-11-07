import Web3 from "web3";
import Web3Modal from "web3modal";
import Portis from "@portis/web3";
import $ from "jquery";
import FrontPageSlider from "./FrontpageSlider";
import WalletConnectProvider from "@walletconnect/web3-provider";
import Cookies from "js-cookie";


$(".btn-play").click(function () {
    window.open( $(this).data("href"), "Gotchiminer", 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, copyhistory=no, width=w, height=h, top=top, left=left');
});

$(async function() {
  $("#start-btn").show();
  let slider : FrontPageSlider = new FrontPageSlider();
});

$(".btn-wallet").on('click', async function() {
  new Audio('assets/sounds/click.mp3').play()
  if("My Account" === $(".btn-wallet-text").text()) {
    window.location.href = "/my-account";
    return;
  }
  //Connect to wallet
  const providerOptions = {
    // Example with WalletConnect provider
    walletconnect: {
      display: {
        description: "Scan qrcode with your mobile wallet"
      },
      package: WalletConnectProvider,
      options: {
        infuraId: "INFURA_ID", // required
        rpc: {
          137: "https://rpc-mainnet.matic.network",
        }
      }
    },
    portis: {
      package: Portis, // required
      options: {
        id: "08b3b594-a3c3-4e3d-a3be-733ca27bffaf" // required
      }
    }
  };

  const web3Modal = new Web3Modal({
    network: "matic", // optional
    theme: "dark",
    cacheProvider: true, // optional
    providerOptions // required
  });
  const provider = await web3Modal.connect();
  const web3 = new Web3(provider);

  //Check if we are on the right chain (Matic)
  const chainId = await web3.eth.getChainId();
  if(chainId !== 137) {
    alert('This game only works with Aavegotchis on the Matic network.' )
    return;
  }

  //Get accounts and sign message using first account
  const accounts = web3.eth.getAccounts(async function(error: Error, accounts: string[]) {
    //Fetch challenge from server
    var jqxhr = $.post( "api/wallet/challenge", { wallet_address: accounts[0], chain_id: chainId } , async function(data ) {
      //Ask for signature to validate wallet ownership
      const messageHash = "Welcome to gotchiminer"
      web3.eth.personal.sign(data.challenge, accounts[0], "", function(error: Error, signature: string) {
        if(error) {
          alert('You need to sign the challenge in order to validate your wallet ownership!');
        } else {
          //Send signature back to server for validation
          var jqxhr = $.post( "api/wallet/validate", { wallet_address: accounts[0], chain_id: chainId, challenge: data.challenge, signature: signature } , async function(data ) {
            new Audio('assets/sounds/success.mp3').play()
            $(".btn-wallet-text").text("My Account");
            Cookies.set('current_wallet', accounts[0], { expires: 365 });

          })
          .fail(function() {
            alert( "Server failed to verify your personal signature, please check your wallet configuration." );
          });;
        }
      });
    })
    .fail(function() {
      alert( "Could not retrieve challenge from server, please try again in a few minutes." );
    });
  });

});
