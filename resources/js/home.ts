import Web3 from "web3";
import Web3Modal from "web3modal";
import Portis from "@portis/web3";

import WalletConnectProvider from "@walletconnect/web3-provider";


$(async function() {
    $("#start-btn").show();
});

$("#start-btn").on('click', async function() {
    //Disable sign in button
    $("#start-btn").prop('disabled', true);

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
        cacheProvider: false, // optional
        providerOptions // required
    });
    const provider = await web3Modal.connect();
    const web3 = new Web3(provider);

    //Check if we are on the right chain (Matic)
    const chainId = await web3.eth.getChainId();
    if(chainId !== 137) {
        alert('This game only works with Aavegotchis on the Matic network.' )
        $("#start-btn").prop('disabled', false);
        return;
    }

    //Get accounts and sign message using first account
    const accounts = web3.eth.getAccounts(async function(error: Error, accounts: string[]) {
        //Ask for signature to validate wallet ownership
        const messageHash = "Welcome to gotchiminer"
        const signature = await web3.eth.personal.sign(messageHash, accounts[0], "")
    });

});
