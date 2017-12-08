//菜单项类型切换
function ModuleTypeChange(mType){
	$('.m_Url').hide();
	switch(mType){
		case 'Slink':
			$('.m_Url').show();
			break;
	}
}