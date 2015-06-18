/*jslint */
/*global AdobeEdge: false, window: false, document: false, console:false, alert: false */
(function (compId) {

    "use strict";
    var im='images/',
        aud='media/',
        vid='media/',
        js='js/',
        fonts = {
        },
        opts = {
            'gAudioPreloadPreference': 'auto',
            'gVideoPreloadPreference': 'auto'
        },
        resources = [
        ],
        scripts = [
        ],
        symbols = {
            "stage": {
                version: "5.0.1",
                minimumCompatibleVersion: "5.0.0",
                build: "5.0.1.386",
                scaleToFit: "none",
                centerStage: "both",
                resizeInstances: false,
                content: {
                    dom: [
                        {
                            id: 'Right',
                            type: 'text',
                            rect: ['106px', '116', 'auto', 'auto', 'auto', 'auto'],
                            text: "よろしい。",
                            font: ['\'ヒラギノ明朝 Pro W3\', \'Hiragino Mincho Pro\', \'ＭＳＰ明朝\', MS PMincho, serif', [40, "px"], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'Decided',
                            type: 'text',
                            rect: ['106px', '170px', 'auto', 'auto', 'auto', 'auto'],
                            text: "決まったぞ。",
                            align: "left",
                            font: ['\'ヒラギノ明朝 Pro W3\', \'Hiragino Mincho Pro\', ＭＳＰ明朝, \'MS PMincho\', serif', [40, "px"], "rgba(0,0,0,1)", "400", "none solid rgb(0, 0, 0)", "normal", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'your_team_is',
                            type: 'text',
                            rect: ['106px', '253px', 'auto', 'auto', 'auto', 'auto'],
                            text: "君のチームは・・・",
                            align: "left",
                            font: ['\'ヒラギノ明朝 Pro W3\', \'Hiragino Mincho Pro\', ＭＳＰ明朝, \'MS PMincho\', serif', [40, "px"], "rgba(0,0,0,1)", "400", "none solid rgb(0, 0, 0)", "normal", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'recognition',
                            type: 'text',
                            rect: ['59px', '422px', 'auto', 'auto', 'auto', 'auto'],
                            text: "認識チーム",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', \'メイリオ\', Meiryo, \'ＭＳＰゴシック\', MS PGothic, sans-serif', [50, "px"], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'kameteam',
                            type: 'text',
                            rect: ['354px', '502px', 'auto', 'auto', 'auto', 'auto'],
                            text: "環境メディアチーム",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', \'メイリオ\', Meiryo, \'ＭＳＰゴシック\', MS PGothic, sans-serif', [50, "px"], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'wearableteam',
                            type: 'text',
                            rect: ['790px', '910px', 'auto', 'auto', 'auto', 'auto'],
                            text: "ウェアラブルチーム",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', \'メイリオ\', Meiryo, \'ＭＳＰゴシック\', MS PGothic, sans-serif', [50, "px"], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'lifeteam',
                            type: 'text',
                            rect: ['417px', '94px', 'auto', 'auto', 'auto', 'auto'],
                            text: "ライフチーム",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', \'メイリオ\', Meiryo, \'ＭＳＰゴシック\', MS PGothic, sans-serif', [50, "px"], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'wearableteamCopy2',
                            type: 'text',
                            rect: ['41px', '78px', 'auto', 'auto', 'auto', 'auto'],
                            text: "IHCIチーム",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', \'メイリオ\', Meiryo, \'ＭＳＰゴシック\', MS PGothic, sans-serif', [50, "px"], "rgba(0,0,0,1)", "normal", "none", "", "break-word", "nowrap"],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'yourTeam',
                            type: 'text',
                            rect: ['0px', '222px', '800px', '75px', 'auto', 'auto'],
                            text: txt[Team.Num],
                            align: "center",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', メイリオ, Meiryo, ＭＳＰゴシック, \'MS PGothic\', sans-serif', [50, "px"], "rgba(0,0,0,1)", "400", "none solid rgb(0, 0, 0)", "normal", "break-word", ""],
                            filter: [0, 0, 1, 1, 0, 0, 0, 100, "rgba(0,0,0,0)", 0, 0, 0]
                        },
                        {
                            id: 'tokyokansei_arranged',
                            display: 'none',
                            volume: '1',
                            type: 'audio',
                            tag: 'audio',
                            rect: ['526', '169', '320px', '45px', 'auto', 'auto'],
                            source: [aud+"tokyokansei_arranged.mp3"],
                            preload: 'auto'
                        }
                    ],
                    style: {
                        '${Stage}': {
                            isStage: true,
                            rect: ['null', 'null', '800px', '594px', 'auto', 'auto'],
                            overflow: 'hidden',
                            fill: ["rgba(255,255,255,0.00)"]
                        }
                    }
                },
                timeline: {
                    duration: 19001,
                    autoPlay: true,
                    data: [
                        [
                            "eid96",
                            "left",
                            13000,
                            6001,
                            "easeInQuart",
                            "${yourTeam}",
                            '39px',
                            '0px'
                        ],
                        [
                            "eid31",
                            "location",
                            5000,
                            3750,
                            "easeInQuart",
                            "${recognition}",
                            [[183.81, 459.99, 0, 0, 0, 0,0],[577.24, 145.33, 0, 0, 0, 0,503.78]]
                        ],
                        [
                            "eid97",
                            "width",
                            13000,
                            6001,
                            "easeInQuart",
                            "${yourTeam}",
                            '733px',
                            '800px'
                        ],
                        [
                            "eid95",
                            "top",
                            19001,
                            0,
                            "easeInQuart",
                            "${yourTeam}",
                            '222px',
                            '222px'
                        ],
                        [
                            "eid86",
                            "height",
                            13000,
                            0,
                            "easeInQuart",
                            "${yourTeam}",
                            '75px',
                            '75px'
                        ],
                        [
                            "eid71",
                            "location",
                            6394,
                            3750,
                            "easeInQuart",
                            "${lifeteam}",
                            [[191, 115.5, 0, 0, 0, 0,0],[691.39, 549.09, 0, 0, 0, 0,662.11]]
                        ],
                        [
                            "eid25",
                            "left",
                            3000,
                            1208,
                            "linear",
                            "${your_team_is}",
                            '106px',
                            '115px'
                        ],
                        [
                            "eid92",
                            "volume",
                            16170,
                            2580,
                            "linear",
                            "${tokyokansei_arranged}",
                            '1',
                            '0'
                        ],
                        [
                            "eid17",
                            "filter.blur",
                            3000,
                            1208,
                            "linear",
                            "${your_team_is}",
                            '100px',
                            '0px'
                        ],
                        [
                            "eid27",
                            "filter.blur",
                            5250,
                            750,
                            "linear",
                            "${your_team_is}",
                            '0px',
                            '100px'
                        ],
                        [
                            "eid67",
                            "filter.blur",
                            5894,
                            798,
                            "easeInQuart",
                            "${wearableteam}",
                            '50px',
                            '55.126201923077px'
                        ],
                        [
                            "eid68",
                            "filter.blur",
                            6692,
                            1588,
                            "easeInQuart",
                            "${wearableteam}",
                            '55.12620162963867px',
                            '0px'
                        ],
                        [
                            "eid69",
                            "filter.blur",
                            8280,
                            914,
                            "easeInQuart",
                            "${wearableteam}",
                            '0px',
                            '19.038461538462px'
                        ],
                        [
                            "eid70",
                            "filter.blur",
                            9194,
                            450,
                            "easeInQuart",
                            "${wearableteam}",
                            '19.038461685180664px',
                            '100px'
                        ],
                        [
                            "eid14",
                            "filter.blur",
                            613,
                            1000,
                            "linear",
                            "${Right}",
                            '100px',
                            '0px'
                        ],
                        [
                            "eid29",
                            "filter.blur",
                            5250,
                            750,
                            "linear",
                            "${Right}",
                            '0px',
                            '100px'
                        ],
                        [
                            "eid23",
                            "left",
                            1429,
                            2071,
                            "linear",
                            "${Decided}",
                            '106px',
                            '115px'
                        ],
                        [
                            "eid66",
                            "location",
                            5894,
                            3750,
                            "easeInQuart",
                            "${wearableteam}",
                            [[641.55, 131.52, 0, 0, 0, 0,0],[219.62, 519.12, 0, 0, 0, 0,572.94]]
                        ],
                        [
                            "eid65",
                            "location",
                            5405,
                            3750,
                            "easeInQuart",
                            "${kameteam}",
                            [[578.97, 539.52, 0, 0, 0, 0,0],[142.82, 131.52, 0, 0, 0, 0,597.24]]
                        ],
                        [
                            "eid83",
                            "filter.blur",
                            11250,
                            500,
                            "easeInQuart",
                            "${yourTeam}",
                            '100px',
                            '14.223208496643px'
                        ],
                        [
                            "eid84",
                            "filter.blur",
                            11750,
                            600,
                            "easeInQuart",
                            "${yourTeam}",
                            '14.223208496643px',
                            '14px'
                        ],
                        [
                            "eid85",
                            "filter.blur",
                            12350,
                            650,
                            "easeInQuart",
                            "${yourTeam}",
                            '14px',
                            '0px'
                        ],
                        [
                            "eid77",
                            "filter.blur",
                            6750,
                            798,
                            "easeInQuart",
                            "${wearableteamCopy2}",
                            '50px',
                            '55.126201923077px'
                        ],
                        [
                            "eid78",
                            "filter.blur",
                            7548,
                            1588,
                            "easeInQuart",
                            "${wearableteamCopy2}",
                            '55.12620162963867px',
                            '0px'
                        ],
                        [
                            "eid79",
                            "filter.blur",
                            9136,
                            914,
                            "easeInQuart",
                            "${wearableteamCopy2}",
                            '0px',
                            '19.038461538462px'
                        ],
                        [
                            "eid80",
                            "filter.blur",
                            10050,
                            450,
                            "easeInQuart",
                            "${wearableteamCopy2}",
                            '19.038461685180664px',
                            '100px'
                        ],
                        [
                            "eid48",
                            "filter.blur",
                            5000,
                            798,
                            "easeInQuart",
                            "${recognition}",
                            '50px',
                            '55.126201923077px'
                        ],
                        [
                            "eid49",
                            "filter.blur",
                            5798,
                            1588,
                            "easeInQuart",
                            "${recognition}",
                            '55.12620162963867px',
                            '0px'
                        ],
                        [
                            "eid50",
                            "filter.blur",
                            7386,
                            914,
                            "easeInQuart",
                            "${recognition}",
                            '0px',
                            '19.038461538462px'
                        ],
                        [
                            "eid51",
                            "filter.blur",
                            8300,
                            450,
                            "easeInQuart",
                            "${recognition}",
                            '19.038461685180664px',
                            '100px'
                        ],
                        [
                            "eid72",
                            "filter.blur",
                            6395,
                            798,
                            "easeInQuart",
                            "${lifeteam}",
                            '50px',
                            '55.126201923077px'
                        ],
                        [
                            "eid73",
                            "filter.blur",
                            7193,
                            1588,
                            "easeInQuart",
                            "${lifeteam}",
                            '55.12620162963867px',
                            '0px'
                        ],
                        [
                            "eid74",
                            "filter.blur",
                            8781,
                            914,
                            "easeInQuart",
                            "${lifeteam}",
                            '0px',
                            '19.038461538462px'
                        ],
                        [
                            "eid75",
                            "filter.blur",
                            9695,
                            450,
                            "easeInQuart",
                            "${lifeteam}",
                            '19.038461685180664px',
                            '100px'
                        ],
                        [
                            "eid15",
                            "filter.blur",
                            1429,
                            1208,
                            "linear",
                            "${Decided}",
                            '100px',
                            '0px'
                        ],
                        [
                            "eid28",
                            "filter.blur",
                            5250,
                            750,
                            "linear",
                            "${Decided}",
                            '0px',
                            '100px'
                        ],
                        [
                            "eid76",
                            "location",
                            6750,
                            3750,
                            "easeInQuart",
                            "${wearableteamCopy2}",
                            [[400, 96.5, 0, 0, 0, 0,0],[400.02, 540.57, 0, 0, 0, 0,444.07]]
                        ],
                        [
                            "eid58",
                            "filter.blur",
                            5405,
                            798,
                            "easeInQuart",
                            "${kameteam}",
                            '50px',
                            '55.126201923077px'
                        ],
                        [
                            "eid59",
                            "filter.blur",
                            6203,
                            1588,
                            "easeInQuart",
                            "${kameteam}",
                            '55.12620162963867px',
                            '0px'
                        ],
                        [
                            "eid60",
                            "filter.blur",
                            7792,
                            914,
                            "easeInQuart",
                            "${kameteam}",
                            '0px',
                            '19.038461538462px'
                        ],
                        [
                            "eid61",
                            "filter.blur",
                            8705,
                            450,
                            "easeInQuart",
                            "${kameteam}",
                            '19.038461685180664px',
                            '100px'
                        ],
                        [
                            "eid20",
                            "left",
                            613,
                            1637,
                            "linear",
                            "${Right}",
                            '106px',
                            '115px'
                        ],
                            [ "eid93", "trigger", 13160.134698082, function executeMediaFunction(e, data) { this._executeMediaAction(e, data); }, ['play', '${tokyokansei_arranged}', [] ] ],
                            [ "eid94", "trigger", 19000.640116038, function executeMediaFunction(e, data) { this._executeMediaAction(e, data); }, ['pause', '${tokyokansei_arranged}', [] ] ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("OutputTest_edgeActions.js");
})("EDGE-116503079");
