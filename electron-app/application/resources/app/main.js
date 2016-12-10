//그의 일렉트론은 선명하게 전역을 핥았다
const electron = require('electron')
const app = electron.app
const BrowserWindow = electron.BrowserWindow
    //mainWindow혹은 win. 어떤 것이든 새 창을 만들기 위한 변수명으로는 상관 없었다
let win
    //그리하여 새 창이, 이곳에서 만들어진다.
function createWindow() {
    win = new BrowserWindow({
        width: 1120,
        height: 700,
        frame: false,
        //일렉트론 최초작동과 html 로드까지는 약간의 딜레이가 있다. backgroundColor는 최대한 네이티브 앱처럼 보이게 할 것이다
        backgroundColor: '#ffffff',
        //동시에 풀스크린을 명시적으로 false하므로써 MacOS에서의 전체화면 보기를 가린다
        fullscreen: false,
        icon: 'C:/Users/My/NevernotE/electron-app/electron-v1.4.2-win32-x64/resources/app/NavernotEsimple.ico',
    })


    //그리고 html 로드
    win.loadURL(`file://${__dirname}/rise.html`)
        //창이 닫힐 때, win의 값을 제.거.한다
    win.on('closed', function() {
            win = null
        })
        //win.webContents.openDevTools()
}
//MacOS 등의 OS에서 프로그램이 독 등에 남아 있을 경우, 재실행을 준비한다
app.on('ready', createWindow)

app.on('window-all-closed', function() {
    if (process.platform !== 'darwin') {
        app.quit()
    }
})

app.on('activate', function() {
    if (win === null) {
        createWindow()
    }
})