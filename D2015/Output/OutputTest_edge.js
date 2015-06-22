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
                            type: 'image',
                            rect: ['84px', '260px', '380px', '414px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"recognition.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 300, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.7','0.7']]
                        },
                        {
                            id: 'media',
                            type: 'image',
                            rect: ['492px', '1032px', '380px', '420px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"media.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 300, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.7','0.7']]
                        },
                        {
                            id: 'wearable',
                            type: 'image',
                            rect: ['1531px', '-116px', '380px', '409px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"wearable.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 0, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.7','0.7']]
                        },
                        {
                            id: 'life',
                            type: 'image',
                            rect: ['1479px', '-474px', '380px', '365px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"life.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 300, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.7','0.7']]
                        },
                        {
                            id: 'ihci',
                            type: 'image',
                            rect: ['-180px', '-830px', '380px', '382px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"ihci.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 0, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.7','0.7']]
                        },
                        {
                            id: 'wearable2',
                            type: 'image',
                            rect: ['383px', '5px', '380px', '409px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"wearable2.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 300, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.75','0.75']]
                        },
                        {
                            id: 'wearable2Copy',
                            type: 'image',
                            rect: ['23px', '7px', '380px', '409px', 'auto', 'auto'],
                            fill: ["rgba(0,0,0,0)",im+"wearable2.png",'0px','0px'],
                            filter: [0, 0, 1, 1, 0, 0, 0, 300, "rgba(0,0,0,0)", 0, 0, 0],
                            transform: [[],[],[],['0.75','0.75']]
                        },
                        {
                            id: 'RoundRect',
                            type: 'rect',
                            rect: ['142px', '216px', '530px', '148px', 'auto', 'auto'],
                            borderRadius: ["10px", "10px", "10px", "10px"],
                            opacity: '0',
                            fill: ["rgba(218,218,218,1.00)"],
                            stroke: [0,"rgba(0,0,0,1)","none"]
                        },
                        {
                            id: 'yourTeam',
                            type: 'text',
                            rect: ['118px', '216px', '567px', '75px', 'auto', 'auto'],
                            text: "双見よりの<br>ウェアラブルチーム！",
                            align: "center",
                            font: ['\'ヒラギノ角ゴ Pro W3\', \'Hiragino Kaku Gothic Pro\', メイリオ, Meiryo, ＭＳＰゴシック, \'MS PGothic\', sans-serif', [50, "px"], "rgba(0,0,0,1)", "400", "none solid rgb(0, 0, 0)", "normal", "break-word", ""],
                            filter: [0, 0, 1, 1, 0, 0, 0, 300, "rgba(0,0,0,0)", 0, 0, 0]
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
                    duration: 23250,
                    autoPlay: true,
                    data: [
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
                            "eid169",
                            "top",
                            16667,
                            1750,
                            "easeInQuart",
                            "${yourTeam}",
                            '222px',
                            '216px'
                        ],
                        [
                            "eid199",
                            "height",
                            16667,
                            1754,
                            "easeInQuart",
                            "${yourTeam}",
                            '75px',
                            '148px'
                        ],
                        [
                            "eid83",
                            "filter.blur",
                            16667,
                            1750,
                            "easeInQuart",
                            "${yourTeam}",
                            '300px',
                            '0px'
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
                            "eid195",
                            "scaleX",
                            16667,
                            0,
                            "easeInQuart",
                            "${wearable2Copy}",
                            '0.75',
                            '0.75'
                        ],
                        [
                            "eid170",
                            "filter.blur",
                            16667,
                            1750,
                            "easeInQuart",
                            "${wearable2}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid176",
                            "scaleX",
                            16667,
                            0,
                            "easeInQuart",
                            "${wearable2}",
                            '0.75',
                            '0.75'
                        ],
                        [
                            "eid136",
                            "filter.blur",
                            5835,
                            4579,
                            "easeInQuart",
                            "${media}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid139",
                            "filter.blur",
                            10414,
                            531,
                            "easeInQuart",
                            "${media}",
                            '0.000000px',
                            '0px'
                        ],
                        [
                            "eid140",
                            "filter.blur",
                            10945,
                            555,
                            "easeInQuart",
                            "${media}",
                            '0px',
                            '300px'
                        ],
                        [
                            "eid146",
                            "location",
                            8838,
                            5489,
                            "easeInQuint",
                            "${life}",
                            [[115.01, 48.24, 0, 0, 0, 0,0],[694.63, 518.98, 0, 0, 0, 0,746.7]]
                        ],
                        [
                            "eid204",
                            "left",
                            18417,
                            0,
                            "easeInQuart",
                            "${yourTeam}",
                            '128px',
                            '128px'
                        ],
                        [
                            "eid205",
                            "left",
                            18421,
                            0,
                            "easeInQuart",
                            "${yourTeam}",
                            '128px',
                            '128px'
                        ],
                        [
                            "eid177",
                            "scaleY",
                            16667,
                            0,
                            "easeInQuart",
                            "${wearable2}",
                            '0.75',
                            '0.75'
                        ],
                        [
                            "eid211",
                            "opacity",
                            17556,
                            861,
                            "easeInQuart",
                            "${RoundRect}",
                            '0',
                            '0.6489138603210449'
                        ],
                        [
                            "eid101",
                            "filter.blur",
                            6802,
                            2270,
                            "easeInQuart",
                            "${recognition}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid103",
                            "filter.blur",
                            9072,
                            531,
                            "easeInQuart",
                            "${recognition}",
                            '0.000000px',
                            '0px'
                        ],
                        [
                            "eid104",
                            "filter.blur",
                            9603,
                            555,
                            "easeInQuart",
                            "${recognition}",
                            '0px',
                            '300px'
                        ],
                        [
                            "eid150",
                            "location",
                            10426,
                            5489,
                            "easeInCirc",
                            "${ihci}",
                            [[406, 6.69, 0, 0, 0, 0,0],[406.01, 553.43, 0, 0, 0, 0,546.74]]
                        ],
                        [
                            "eid142",
                            "location",
                            7426,
                            5489,
                            "easeInQuint",
                            "${wearable}",
                            [[700.59, 122.44, 0, 0, 0, 0,0],[133, 486.22, 0, 0, 0, 0,674.16]]
                        ],
                        [
                            "eid92",
                            "volume",
                            20500,
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
                            "eid207",
                            "left",
                            18417,
                            0,
                            "easeInQuart",
                            "${wearable2}",
                            '406px',
                            '406px'
                        ],
                        [
                            "eid208",
                            "left",
                            18421,
                            0,
                            "easeInQuart",
                            "${wearable2}",
                            '406px',
                            '406px'
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
                            "eid20",
                            "left",
                            613,
                            1637,
                            "linear",
                            "${Right}",
                            '106px',
                            '115px'
                        ],
                        [
                            "eid151",
                            "filter.blur",
                            10250,
                            4579,
                            "easeInQuart",
                            "${ihci}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid167",
                            "filter.blur",
                            15415,
                            500,
                            "easeInQuart",
                            "${ihci}",
                            '0px',
                            '300px'
                        ],
                        [
                            "eid143",
                            "filter.blur",
                            7250,
                            4579,
                            "easeInQuart",
                            "${wearable}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid157",
                            "filter.blur",
                            12415,
                            500,
                            "easeInQuart",
                            "${wearable}",
                            '0px',
                            '300px'
                        ],
                        [
                            "eid105",
                            "location",
                            4669,
                            5489,
                            "easeInBack",
                            "${recognition}",
                            [[133.01, 457.9, 0, 0, 0, 0,0],[667, 152, 0, 0, 0, 0,615.4]]
                        ],
                        [
                            "eid185",
                            "width",
                            18421,
                            0,
                            "easeInQuart",
                            "${yourTeam}",
                            '567px',
                            '567px'
                        ],
                        [
                            "eid198",
                            "left",
                            16667,
                            1754,
                            "easeInQuart",
                            "${wearable2Copy}",
                            '443px',
                            '23px'
                        ],
                        [
                            "eid193",
                            "top",
                            16667,
                            1750,
                            "easeInQuart",
                            "${wearable2Copy}",
                            '-149px',
                            '7px'
                        ],
                        [
                            "eid175",
                            "top",
                            16667,
                            889,
                            "easeInQuart",
                            "${wearable2}",
                            '-149px',
                            '-212px'
                        ],
                        [
                            "eid212",
                            "top",
                            17556,
                            861,
                            "easeInQuart",
                            "${wearable2}",
                            '-212px',
                            '5px'
                        ],
                        [
                            "eid194",
                            "scaleY",
                            16667,
                            0,
                            "easeInQuart",
                            "${wearable2Copy}",
                            '0.75',
                            '0.75'
                        ],
                        [
                            "eid196",
                            "filter.blur",
                            16667,
                            1750,
                            "easeInQuart",
                            "${wearable2Copy}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid147",
                            "filter.blur",
                            8662,
                            4579,
                            "easeInQuart",
                            "${life}",
                            '300px',
                            '0px'
                        ],
                        [
                            "eid164",
                            "filter.blur",
                            13766,
                            561,
                            "easeInQuint",
                            "${life}",
                            '0px',
                            '300px'
                        ],
                        [
                            "eid135",
                            "location",
                            6011,
                            5489,
                            "easeInQuint",
                            "${media}",
                            [[673, 458.01, 0, 0, 0, 0,0],[91.22, 83.01, 0, 0, 0, 0,692.17]]
                        ],
                            [ "eid93", "trigger", 18750, function executeMediaFunction(e, data) { this._executeMediaAction(e, data); }, ['play', '${tokyokansei_arranged}', [] ] ],
                            [ "eid94", "trigger", 23250, function executeMediaFunction(e, data) { this._executeMediaAction(e, data); }, ['pause', '${tokyokansei_arranged}', [] ] ]
                    ]
                }
            }
        };

    AdobeEdge.registerCompositionDefn(compId, symbols, fonts, scripts, resources, opts);

    if (!window.edge_authoring_mode) AdobeEdge.getComposition(compId).load("OutputTest_edgeActions.js");
})("EDGE-116503079");
