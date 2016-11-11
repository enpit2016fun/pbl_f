Dim excelApp : Set excelApp = CreateObject("Excel.Application")
' Excelを非表示にする
excelApp.Visible = False

Dim targetFile : targetFile = WScript.Arguments(0)
Dim targetMacro : targetMacro = WScript.Arguments(1)
' Excelファイルを開く
excelApp.Workbooks.Open targetFile
' マクロの実行
excelApp.Run targetMacro
' Excelの終了
excelApp.Quit