import Phaser from "phaser";
import jQuery from "jquery";
import Moralis from "moralis";

/* Moralis init code */
const serverUrl = "https://ovwj5gs6lbln.usemoralis.com:2053/server";
const appId = "UYWH6h3Wrv9MQGZtgcJcqcZdEopZd2CNv2W0rbv4";
Moralis.start({ serverUrl, appId });

$(function() {
    const config: Phaser.Types.Core.GameConfig = {
        type: Phaser.WEBGL,
        title: "Gotchminer",
        parent: "phaser-wrapper",
        width: $("#phaser-wrapper").width(),
        height: $("#phaser-wrapper").height(),
        input: {
            gamepad: true
        },
        physics: {
            default: 'arcade',
            arcade: {
                gravity: { y: 0 }
            }
        },
        
    }

    const game = new Phaser.Game(config);
    $("#start-btn").show();
});

$("#start-btn").on('click', function() {
    $("#start-btn").prop('disabled', true);
    // const moralis = Moralis.authenticate().then(function (user) {
    //     console.log(user.get('ethAddress'))
    // })
});
