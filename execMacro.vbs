Dim excelApp : Set excelApp = CreateObject("Excel.Application")
' Excel���\���ɂ���
excelApp.Visible = False

Dim targetFile : targetFile = WScript.Arguments(0)
Dim targetMacro : targetMacro = WScript.Arguments(1)
' Excel�t�@�C�����J��
excelApp.Workbooks.Open targetFile
' �}�N���̎��s
excelApp.Run targetMacro
' Excel�̏I��
excelApp.Quit