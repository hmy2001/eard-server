<?php
namespace Eard;


use pocketmine\item\Item;


/***
*
*	アイテムの、日本語名を入れておくためのやつ
*/
class ItemName{



	public static function getNameOf($id, $meta){
		$id = $item->getId();
		$meta = $item->getMetadata();

		if( isset(self::$listById[$id][$meta]) ){
			return self::$listById[$id][$meta]; //書いてあれば日本語名
		}else{
			return Item::get()->getName(); //書いてなければ英名
		}
	}

	public static function init(){

		// 変換
		$list = [];
		foreach(self::$listByName as $name => $i){
			$list[$i[0]][$i[1]] = $name;
		}
		self::$listById = $list;
	}


	private static $listByName = [
		"焼き石" => [1,0],
		"石" => [1,0],
		"花崗岩" => [1,1],
		"磨かれた花崗岩" => [1,2],
		"閃緑岩" => [1,3],
		"磨かれた閃緑岩" => [1,4],
		"安山岩" => [1,5],
		"磨かれた安山岩" => [1,6],
		"草ブロック" => [2,0],
		"土" => [3,0],
		"丸石"=>[4,0],
		"樫の木材"=>[5,0],
		"トウヒの木材"=>[5,1],
		"樺の木材"=>[5,2],
		"ジャングルの木の木材"=>[5,3],
		"アカシアの木材"=>[5,4],
		"黒樫の木材"=>[5,5],
		"樫の苗木"=>[6,0],
		"トウヒの苗木"=>[6,1],
		"樺の苗木"=>[6,2],
		"ジャングルの苗木"=>[6,3],
		"アカシアの苗木"=>[6,4],
		"黒樫の苗木"=>[6,5],
		"岩盤"=>[7,0],
		"水"=>[8,0],
		"水"=>[9,0],
		"溶岩"=>[10,0],
		"tile.lava.name"=>[11,0],
		"砂"=>[12,0],
		"赤砂"=>[12,1],
		"砂利"=>[13,0],
		"金鉱石"=>[14,0],
		"鉄鉱石"=>[15,0],
		"石炭鉱石"=>[16,0],
		"樫の木"=>[17,0],
		"トウヒの木"=>[17,1],
		"樺の木"=>[17,2],
		"ジャングルの木"=>[17,3],
		"樫の葉"=>[18,0],
		"トウヒの葉"=>[18,1],
		"樺の葉"=>[18,2],
		"ジャングルの木の葉"=>[18,3],
		"スポンジ"=>[19,0],
		"ぬれたスポンジ"=>[19,1],
		"tile.sponge.name"=>[19,2],
		"ガラス"=>[20,0],
		"ラピスラズリ鉱石"=>[21,0],
		"ラピスラズリのブロック"=>[22,0],
		"発射装置"=>[23,0],
		"砂岩"=>[24,0],
		"模様入り砂岩"=>[24,1],
		"なめらかな砂岩"=>[24,2],
		"音ブロック"=>[25,0],
		"ベッド"=>[26,0],
		"加速レール"=>[27,0],
		"感知レール"=>[28,0],
		"吸着ピストン"=>[29,0],
		"クモの巣"=>[30,0],
		"シダ"=>[31,0],
		"草"=>[31,1],
		"枯れ木"=>[32,0],
		"ピストン"=>[33,0],
		"tile.pistonArmCollision.name"=>[34,0],
		"白のウール"=>[35,0],
		"オレンジのウール"=>[35,1],
		"赤紫のウール"=>[35,2],
		"空色のウール"=>[35,3],
		"黄色のウール"=>[35,4],
		"黄緑のウール"=>[35,5],
		"ピンクのウール"=>[35,6],
		"灰色のウール"=>[35,7],
		"薄灰色のウール"=>[35,8],
		"水色のウール"=>[35,9],
		"紫のウール"=>[35,10],
		"青のウール"=>[35,11],
		"茶色のウール"=>[35,12],
		"緑のウール"=>[35,13],
		"赤のウール"=>[35,14],
		"黒のウール"=>[35,15],
		"タンポポ"=>[37,0],
		"ポピー"=>[38,0],
		"ヒスイラン"=>[38,1],
		"アリウム"=>[38,2],
		"ヒナソウ"=>[38,3],
		"赤のチューリップ"=>[38,4],
		"オレンジのチューリップ"=>[38,5],
		"白のチューリップ"=>[38,6],
		"ピンクのチューリップ"=>[38,7],
		"フランスギク"=>[38,8],
		"きのこ"=>[39,0],
		"きのこ"=>[40,0],
		"金のブロック"=>[41,0],
		"鉄のブロック"=>[42,0],
		"石ハーフブロック"=>[43,0],
		"砂岩ハーフブロック"=>[43,1],
		"木材ハーフブロック"=>[43,2],
		"丸石ハーフブロック"=>[43,3],
		"レンガのハーフブロック"=>[43,4],
		"石レンガハーフブロック"=>[43,5],
		"クォーツのハーフブロック"=>[43,6],
		"暗黒レンガのハーフブロック"=>[43,7],
		"石ハーフブロック"=>[44,0],
		"砂岩ハーフブロック"=>[44,1],
		"木材ハーフブロック"=>[44,2],
		"丸石ハーフブロック"=>[44,3],
		"レンガハーフブロック"=>[44,4],
		"石レンガハーフブロック"=>[44,5],
		"クォーツのハーフブロック"=>[44,6],
		"暗黒レンガのハーフブロック"=>[44,7],
		"レンガ"=>[45,0],
		"TNT 火薬"=>[46,0],
		"本棚"=>[47,0],
		"苔石"=>[48,0],
		"黒曜石"=>[49,0],
		"たいまつ"=>[50,0],
		"火"=>[51,0],
		"モンスター スポーナー"=>[52,0],
		"樫の階段"=>[53,0],
		"チェスト"=>[54,0],
		"レッドストーンの粉"=>[55,0],
		"ダイヤモンド鉱石"=>[56,0],
		"ダイヤモンドのブロック"=>[57,0],
		"作業台"=>[58,0],
		"作物"=>[59,0],
		"農地"=>[60,0],
		"かまど"=>[61,0],
		"tile.lit_furnace.name"=>[62,0],
		"看板"=>[63,0],
		"tile.wooden_door.name"=>[64,0],
		"はしご"=>[65,0],
		"レール"=>[66,0],
		"丸石の階段"=>[67,0],
		"tile.wall_sign.name"=>[68,0],
		"レバー"=>[69,0],
		"石の感圧板"=>[70,0],
		"鉄のドア"=>[71,0],
		"木製の感圧板"=>[72,0],
		"レッドストーン鉱石"=>[73,0],
		"tile.lit_redstone_ore.name"=>[74,0],
		"レッドストーンのたいまつ"=>[75,0],
		"レッドストーンのたいまつ"=>[76,0],
		"ボタン"=>[77,0],
		"積雪"=>[78,0],
		"氷"=>[79,0],
		"雪"=>[80,0],
		"サボテン"=>[81,0],
		"粘土"=>[82,0],
		"サトウキビ"=>[83,0],
		"樫の木の柵"=>[85,0],
		"トウヒの木の柵"=>[85,1],
		"樺の木の柵"=>[85,2],
		"ジャングルの木の柵"=>[85,3],
		"アカシアの木の柵"=>[85,4],
		"黒樫の木の柵"=>[85,5],
		"カボチャ"=>[86,0],
		"暗黒石"=>[87,0],
		"ソウルサンド"=>[88,0],
		"グロウストーン"=>[89,0],
		"ポータル"=>[90,0],
		"ジャック・オ・ランタン"=>[91,0],
		"ケーキ"=>[92,0],
		"tile.unpowered_repeater.name"=>[93,0],
		"tile.powered_repeater.name"=>[94,0],
		"木のトラップドア"=>[96,0],
		"シルバーフィッシュ入りの石"=>[97,0],
		"シルバーフィッシュ入りの丸石"=>[97,1],
		"シルバーフィッシュ入り石レンガ"=>[97,2],
		"シルバーフィッシュの苔の生えた石レンガ"=>[97,3],
		"ひび割れた石レンガモンスターエッグ"=>[97,4],
		"模様入り石レンガモンスターエッグ"=>[97,5],
		"石レンガ"=>[98,0],
		"苔の生えた石レンガ"=>[98,1],
		"ひび割れた石レンガ"=>[98,2],
		"模様入り石レンガ"=>[98,3],
		"滑らかな石のレンガ"=>[98,4],
		"きのこ"=>[99,0],
		"きのこ"=>[100,0],
		"鉄格子"=>[101,0],
		"ガラス板"=>[102,0],
		"スイカ"=>[103,0],
		"カボチャの茎"=>[104,0],
		"tile.melon_stem.name"=>[105,0],
		"つた"=>[106,0],
		"樫の木の柵のゲート"=>[107,0],
		"レンガ階段"=>[108,0],
		"石レンガ階段"=>[109,0],
		"菌糸"=>[110,0],
		"スイレンの葉"=>[111,0],
		"暗黒レンガ"=>[112,0],
		"暗黒レンガの柵"=>[113,0],
		"トウヒの木の柵"=>[113,1],
		"樺の木の柵"=>[113,2],
		"ジャングルの木の柵"=>[113,3],
		"アカシアの木の柵"=>[113,4],
		"黒樫の木の柵"=>[113,5],
		"暗黒レンガ階段"=>[114,0],
		"ネザーウォート"=>[115,0],
		"エンチャントテーブル"=>[116,0],
		"調合台"=>[117,0],
		"大釜"=>[118,0],
		"tile.end_portal.name"=>[119,0],
		"エンドポータル"=>[120,0],
		"エンドストーン"=>[121,0],
		"ドラゴンの卵"=>[122,0],
		"レッドストーン ランプ"=>[123,0],
		"tile.lit_redstone_lamp.name"=>[124,0],
		"ドロッパー"=>[125,0],
		"アクティベーター レール"=>[126,0],
		"ココア"=>[127,0],
		"砂岩の階段"=>[128,0],
		"エメラルド鉱石"=>[129,0],
		"エンダー チェスト"=>[130,0],
		"トリップワイヤー フック"=>[131,0],
		"トリップワイヤー"=>[132,0],
		"エメラルドのブロック"=>[133,0],
		"トウヒの階段"=>[134,0],
		"樺の階段"=>[135,0],
		"ジャングルの木の階段"=>[136,0],
		"コマンドブロック"=>[137,0],
		"ビーコン"=>[138,0],
		"丸石の壁"=>[139,0],
		"苔の生えた丸石の壁"=>[139,1],
		"tile.flower_pot.name"=>[140,0],
		"tile.carrots.name"=>[141,0],
		"ジャガイモ"=>[142,0],
		"ボタン"=>[143,0],
		"ガイコツの頭"=>[144,0],
		"ウィザー ガイコツの頭"=>[144,1],
		"ゾンビの頭"=>[144,2],
		"ヘッド"=>[144,3],
		"クリーパー ヘッド"=>[144,4],
		"ドラゴンの頭"=>[144,5],
		"金床"=>[145,0],
		"少し壊れた金床"=>[145,1],
		"かなり壊れた金床"=>[145,2],
		"トラップ チェスト"=>[146,0],
		"重量感知板 (軽)"=>[147,0],
		"重量感知板 (重)"=>[148,0],
		"tile.unpowered_comparator.name"=>[149,0],
		"tile.powered_comparator.name"=>[150,0],
		"日照センサー"=>[151,0],
		"レッドストーンのブロック"=>[152,0],
		"闇のクォーツ鉱石"=>[153,0],
		"ホッパー"=>[154,0],
		"クォーツのブロック"=>[155,0],
		"模様入りクォーツのブロック"=>[155,1],
		"柱状のクォーツのブロック"=>[155,2],
		"クォーツの階段"=>[156,0],
		"tile.double_wooden_slab.oak.name"=>[157,0],
		"tile.double_wooden_slab.spruce.name"=>[157,1],
		"tile.double_wooden_slab.birch.name"=>[157,2],
		"tile.double_wooden_slab.jungle.name"=>[157,3],
		"tile.double_wooden_slab.acacia.name"=>[157,4],
		"tile.double_wooden_slab.big_oak.name"=>[157,5],
		"tile.double_wooden_slab..name"=>[157,6],
		"樫のハーフブロック"=>[158,0],
		"トウヒのハーフブロック"=>[158,1],
		"樺のハーフブロック"=>[158,2],
		"ジャングルの木のハーフブロック"=>[158,3],
		"アカシアの木のハーフブロック"=>[158,4],
		"黒樫の木のハーフブロック"=>[158,5],
		"tile.wooden_slab..name"=>[158,6],
		"白の色付き粘土"=>[159,0],
		"オレンジの色付き粘土"=>[159,1],
		"赤紫の色付き粘土"=>[159,2],
		"空色の色付き粘土"=>[159,3],
		"黄色の色付き粘土"=>[159,4],
		"黄緑の色付き粘土"=>[159,5],
		"ピンクの色付き粘土"=>[159,6],
		"灰色の色付き粘土"=>[159,7],
		"薄灰色の色付き粘土"=>[159,8],
		"水色の色付き粘土"=>[159,9],
		"紫の色付き粘土"=>[159,10],
		"青の色付き粘土"=>[159,11],
		"茶色の色付き粘土"=>[159,12],
		"緑の色付き粘土"=>[159,13],
		"赤の色付き粘土"=>[159,14],
		"黒の色付き粘土"=>[159,15],
		"ガラス板"=>[160,0],
		"アカシアの葉"=>[161,0],
		"黒樫の木の葉"=>[161,1],
		"アカシアの原木"=>[162,0],
		"黒樫の木"=>[162,1],
		"アカシアの木の階段"=>[163,0],
		"黒樫の木の階段"=>[164,0],
		"スライムブロック"=>[165,0],
		"鉄のトラップドア"=>[167,0],
		"海晶ブロック"=>[168,0],
		"暗海晶ブロック"=>[168,1],
		"海晶レンガ"=>[168,2],
		"海のランタン"=>[169,0],
		"干し草の俵"=>[170,0],
		"白のカーペット"=>[171,0],
		"オレンジのカーペット"=>[171,1],
		"赤紫のカーペット"=>[171,2],
		"空色のカーペット"=>[171,3],
		"黄色のカーペット"=>[171,4],
		"黄緑のカーペット"=>[171,5],
		"ピンクのカーペット"=>[171,6],
		"灰色のカーペット"=>[171,7],
		"薄灰色のカーペット"=>[171,8],
		"水色のカーペット"=>[171,9],
		"紫のカーペット"=>[171,10],
		"青のカーペット"=>[171,11],
		"茶色のカーペット"=>[171,12],
		"緑のカーペット"=>[171,13],
		"赤のカーペット"=>[171,14],
		"黒のカーペット"=>[171,15],
		"堅焼き粘土"=>[172,0],
		"石炭のブロック"=>[173,0],
		"氷塊"=>[174,0],
		"ヒマワリ"=>[175,0],
		"ライラック"=>[175,1],
		"背の高い草"=>[175,2],
		"大きなシダ"=>[175,3],
		"バラの低木"=>[175,4],
		"ボタン"=>[175,5],
		"tile.daylight_detector_inverted.name"=>[178,0],
		"赤砂岩"=>[179,0],
		"模様入りの赤砂岩"=>[179,1],
		"滑らかな赤砂岩"=>[179,2],
		"赤砂岩の階段"=>[180,0],
		"赤砂岩のハーフブロック"=>[181,0],
		"tile.double_stone_slab2.purpur.name"=>[181,1],
		"tile.double_stone_slab2.stone.name"=>[181,2],
		"赤砂岩のハーフブロック"=>[182,0],
		"プルプァのハーフブロック"=>[182,1],
		"tile.stone_slab2.stone.name"=>[182,2],
		"トウヒの木の柵のゲート"=>[183,0],
		"樺の木の柵のゲート"=>[184,0],
		"ジャングルの木の柵のゲート"=>[185,0],
		"黒樫の木の柵のゲート"=>[186,0],
		"アカシアの木の柵のゲート"=>[187,0],
		"コマンドブロックの反復"=>[188,0],
		"コマンドブロックのチェーン"=>[189,0],
		"tile.spruce_door.name"=>[193,0],
		"tile.birch_door.name"=>[194,0],
		"tile.jungle_door.name"=>[195,0],
		"tile.acacia_door.name"=>[196,0],
		"tile.dark_oak_door.name"=>[197,0],
		"草の道"=>[198,0],
		"tile.frame.name"=>[199,0],
		"コーラスの花"=>[200,0],
		"プルプァ ブロック"=>[201,0],
		"tile.purpur_block.chiseled.name"=>[201,1],
		"プルプァの柱"=>[201,2],
		"プルプァの階段"=>[203,0],
		"エンドストーンレンガ"=>[206,0],
		"tile.frosted_ice.name"=>[207,0],
		"果てのロッド"=>[208,0],
		"tile.end_gateway.name"=>[209,0],
		"マグマ ブロック"=>[213,0],
		"暗黒茸ブロック"=>[214,0],
		"赤い暗黒レンガ"=>[215,0],
		"骨ブロック"=>[216,0],
		"白のシュルカー ボックス"=>[218,0],
		"オレンジのシュルカー ボックス"=>[218,1],
		"赤紫のシュルカー ボックス"=>[218,2],
		"空色のシュルカー ボックス"=>[218,3],
		"黄色のシュルカー ボックス"=>[218,4],
		"黄緑のシュルカー ボックス"=>[218,5],
		"ピンクのシュルカー ボックス"=>[218,6],
		"灰色のシュルカー ボックス"=>[218,7],
		"薄灰色のシュルカー ボックス"=>[218,8],
		"水色のシュルカー ボックス"=>[218,9],
		"紫のシュルカー ボックス"=>[218,10],
		"青のシュルカー ボックス"=>[218,11],
		"茶色のシュルカー ボックス"=>[218,12],
		"緑のシュルカー ボックス"=>[218,13],
		"赤のシュルカー ボックス"=>[218,14],
		"黒のシュルカー ボックス"=>[218,15],
		"紫の彩釉テラコッタ"=>[219,0],
		"白の彩釉テラコッタ"=>[220,0],
		"オレンジの彩釉テラコッタ"=>[221,0],
		"赤紫の彩釉テラコッタ"=>[222,0],
		"空色の彩釉テラコッタ"=>[223,0],
		"黄色の彩釉テラコッタ"=>[224,0],
		"黄緑の彩釉テラコッタ"=>[225,0],
		"ピンクの彩釉テラコッタ"=>[226,0],
		"灰色の彩釉テラコッタ"=>[227,0],
		"薄灰色の彩釉テラコッタ"=>[228,0],
		"水色の彩釉テラコッタ"=>[229,0],
		"青の彩釉テラコッタ"=>[231,0],
		"茶色の彩釉テラコッタ"=>[232,0],
		"緑の彩釉テラコッタ"=>[233,0],
		"赤の彩釉テラコッタ"=>[234,0],
		"黒の彩釉テラコッタ"=>[235,0],
		"白のコンクリート"=>[236,0],
		"オレンジのコンクリート"=>[236,1],
		"赤紫のコンクリート"=>[236,2],
		"空色のコンクリート"=>[236,3],
		"黄色のコンクリート"=>[236,4],
		"黄緑のコンクリート"=>[236,5],
		"ピンクのコンクリート"=>[236,6],
		"灰色のコンクリート"=>[236,7],
		"薄灰色のコンクリート"=>[236,8],
		"水色のコンクリート"=>[236,9],
		"紫のコンクリート"=>[236,10],
		"青のコンクリート"=>[236,11],
		"茶色のコンクリート"=>[236,12],
		"緑のコンクリート"=>[236,13],
		"赤のコンクリート"=>[236,14],
		"黒のコンクリート"=>[236,15],
		"白のコンクリート パウダー"=>[237,0],
		"オレンジのコンクリート パウダー"=>[237,1],
		"赤紫のコンクリート パウダー"=>[237,2],
		"空色のコンクリート パウダー"=>[237,3],
		"黄色のコンクリート パウダー"=>[237,4],
		"黄緑のコンクリート パウダー"=>[237,5],
		"ピンクのコンクリート パウダー"=>[237,6],
		"灰色のコンクリート パウダー"=>[237,7],
		"薄灰色のコンクリート パウダー"=>[237,8],
		"水色のコンクリート パウダー"=>[237,9],
		"紫のコンクリート パウダー"=>[237,10],
		"青のコンクリート パウダー"=>[237,11],
		"茶色のコンクリート パウダー"=>[237,12],
		"緑のコンクリート パウダー"=>[237,13],
		"赤のコンクリート パウダー"=>[237,14],
		"黒のコンクリート パウダー"=>[237,15],
		"コーラス プラント"=>[240,0],
		"ガラス"=>[241,0],
		"ポドゾル"=>[243,0],
		"ビートルート"=>[244,0],
		"ストーン カッター"=>[245,0],
		"tile.glowingobsidian.name"=>[246,0],
		"闇のリアクター コア"=>[247,0],
		"tile.info_update.name"=>[248,0],
		"tile.info_update2.name"=>[249,0],
		"tile.movingBlock.name"=>[250,0],
		"観察者"=>[251,0],

		"オークの木材"=>[5,0],
		"マツの木材"=>[5,1],
		"シラカバの木材"=>[5,2],
		"ジャングルの木材"=>[5,3],
		"ダークオークの木材"=>[5,5],
		"オークの苗木"=>[6,0],
		"マツの苗木"=>[6,1],
		"シラカバの苗木"=>[6,2],
		"ダークオークの苗木"=>[6,5],
		"赤い砂"=>[12,1],
		"オークの原木"=>[17,0],
		"マツの原木"=>[17,1],
		"シラカバの原木"=>[17,2],
		"ジャングルの原木"=>[17,3],
		"オークの葉"=>[18,0],
		"マツの葉"=>[18,1],
		"シラカバの葉"=>[18,2],
		"濡れたスポンジ"=>[19,1],
		"ラピスラズリブロック"=>[22,0],
		"ディスペンサー"=>[23,0],
		"音符ブロック"=>[25,0],
		"パワードレール"=>[27,0],
		"ディレクターレール"=>[28,0],
		"粘着ピストン"=>[29,0],
		"羊毛"=>[35,0],
		"橙色の羊毛"=>[35,1],
		"赤紫色の羊毛"=>[35,2],
		"空色の羊毛"=>[35,3],
		"黄色の羊毛"=>[35,4],
		"黄緑色の羊毛"=>[35,5],
		"桃色の羊毛"=>[35,6],
		"灰色の羊毛"=>[35,7],
		"薄灰色の羊毛"=>[35,8],
		"水色の羊毛"=>[35,9],
		"紫色の羊毛"=>[35,10],
		"青色の羊毛"=>[35,11],
		"茶色の羊毛"=>[35,12],
		"緑色の羊毛"=>[35,13],
		"赤色の羊毛"=>[35,14],
		"黒色の羊毛"=>[35,15],
		"赤色のチューリップ"=>[38,4],
		"橙色のチューリップ"=>[38,5],
		"白色のチューリップ"=>[38,6],
		"桃色のチューリップ"=>[38,7],
		"キノコ"=>[39,0],
		"キノコ"=>[40,0],
		"金ブロック"=>[41,0],
		"鉄ブロック"=>[42,0],
		"砂岩のハーフブロック"=>[43,1],
		"水晶ハーフブロック"=>[43,6],
		"ネザーレンガハーフブロック"=>[43,7],
		"水晶ハーフブロック"=>[44,6],
		"ネザーレンガハーフブロック"=>[44,7],
		"TNT"=>[46,0],
		"松明"=>[50,0],
		"炎"=>[51,0],
		"モンスタースポナー"=>[52,0],
		"オークの木の階段"=>[53,0],
		"レッドストーンダスト"=>[55,0],
		"ダイヤモンドブロック"=>[57,0],
		"耕地"=>[60,0],
		"レッドストーントーチ"=>[75,0],
		"レッドストーントーチ"=>[76,0],
		"雪の層"=>[78,0],
		"オークのフェンス"=>[85,0],
		"マツのフェンス"=>[85,1],
		"シラカバのフェンス"=>[85,2],
		"ジャングルのフェンス"=>[85,3],
		"アカシアのフェンス"=>[85,4],
		"ダークオークのフェンス"=>[85,5],
		"ネザーラック"=>[87,0],
		"null"=>[95,0],
		"シルバーフィッシュ入りの石レンガ"=>[97,2],
		"シルバーフィッシュ入りの苔の生えた石レンガ"=>[97,3],
		"シルバーフィッシュ入りのひびの入った石レンガ"=>[97,4],
		"シルバーフィッシュ入りの模様入り石レンガ"=>[97,5],
		"キノコ"=>[99,0],
		"キノコ"=>[100,0],
		"板ガラス"=>[102,0],
		"カボチャの芽"=>[104,0],
		"ツタ"=>[106,0],
		"オークのフェンスゲート"=>[107,0],
		"ネザーレンガ"=>[112,0],
		"ネザーレンガのフェンス"=>[113,0],
		"マツのフェンス"=>[113,1],
		"シラカバのフェンス"=>[113,2],
		"ジャングルのフェンス"=>[113,3],
		"アカシアのフェンス"=>[113,4],
		"ダークオークのフェンス"=>[113,5],
		"ネザーレンガの階段"=>[114,0],
		"醸造台"=>[117,0],
		"レッドストーンランプ"=>[123,0],
		"アクティベーターレール"=>[126,0],
		"カカオの実"=>[127,0],
		"エンダーチェスト"=>[130,0],
		"トリップワイヤーフック"=>[131,0],
		"エメラルドブロック"=>[133,0],
		"マツの木の階段"=>[134,0],
		"シラカバの木の階段"=>[135,0],
		"苔石の壁"=>[139,1],
		"スケルトンの頭蓋骨"=>[144,0],
		"ウィザースケルトンの頭蓋骨"=>[144,1],
		"頭"=>[144,3],
		"クリーパーの頭"=>[144,4],
		"トラップチェスト"=>[146,0],
		"レッドストーンブロック"=>[152,0],
		"ネザークォーツ鉱石"=>[153,0],
		"ネザー水晶ブロック"=>[155,0],
		"模様入りネザー水晶ブロック"=>[155,1],
		"柱状のネザー水晶ブロック"=>[155,2],
		"オークの木材ハーフブロック"=>[158,0],
		"マツの木材ハーフブロック"=>[158,1],
		"シラカバの木材ハーフブロック"=>[158,2],
		"ジャングルの木材ハーフブロック"=>[158,3],
		"アカシアの木材ハーフブロック"=>[158,4],
		"ダークオークの木材ハーフブロック"=>[158,5],
		"白色の堅焼き粘土"=>[159,0],
		"橙色の堅焼き粘土"=>[159,1],
		"赤紫色の堅焼き粘土"=>[159,2],
		"空色の堅焼き粘土"=>[159,3],
		"黄色の堅焼き粘土"=>[159,4],
		"黄緑色の堅焼き粘土"=>[159,5],
		"桃色の堅焼き粘土"=>[159,6],
		"灰色の堅焼き粘土"=>[159,7],
		"薄灰色の堅焼き粘土"=>[159,8],
		"水色の堅焼き粘土"=>[159,9],
		"紫色の堅焼き粘土"=>[159,10],
		"青色の堅焼き粘土"=>[159,11],
		"茶色の堅焼き粘土"=>[159,12],
		"緑色の堅焼き粘土"=>[159,13],
		"赤色の堅焼き粘土"=>[159,14],
		"黒色の堅焼き粘土"=>[159,15],
		"板ガラス"=>[160,0],
		"ダークオークの葉"=>[161,1],
		"ダークオークの原木"=>[162,1],
		"ダークオークの木の階段"=>[164,0],
		"プリズマリン"=>[168,0],
		"ダークプリズマリンブロック"=>[168,1],
		"プリズマリンレンガ"=>[168,2],
		"シーランタン"=>[169,0],
		"干草の俵"=>[170,0],
		"橙色のカーペット"=>[171,1],
		"赤紫色のカーペット"=>[171,2],
		"黄緑色のカーペット"=>[171,5],
		"桃色のカーペット"=>[171,6],
		"紫色のカーペット"=>[171,10],
		"青色のカーペット"=>[171,11],
		"緑色のカーペット"=>[171,13],
		"赤色のカーペット"=>[171,14],
		"黒色のカーペット"=>[171,15],
		"石炭ブロック"=>[173,0],
		"高い草"=>[175,2],
		"赤い砂岩"=>[179,0],
		"模様入りの赤い砂岩"=>[179,1],
		"滑らかな赤い砂岩"=>[179,2],
		"赤い砂岩の階段"=>[180,0],
		"赤い砂岩のハーフブロック"=>[181,0],
		"赤い砂岩のハーフブロック"=>[182,0],
		"マツのフェンスゲート"=>[183,0],
		"シラカバのフェンスゲート"=>[184,0],
		"ジャングルのフェンスゲート"=>[185,0],
		"ダークオークのフェンスゲート"=>[186,0],
		"アカシアのフェンスゲート"=>[187,0],
		"コーラスフラワー"=>[200,0],
		"プルプァブロック"=>[201,0],
		"エンドロッド"=>[208,0],
		"マグマブロック"=>[213,0],
		"ネザーウォートブロック"=>[214,0],
		"赤いネザーレンガ"=>[215,0],
		
		"鉄のスコップ" => [256, 0],
		"鉄のピッケル" => [257,0],
		"鉄のオノ" => [258,0],
		"打ち金と火打石" => [259,0],
		"りんご" => [260,0],
		"弓" => [261,0],
		"矢" => [262,0],
		"石炭" => [263,0],
		"ダイヤモンド" => [264,0],
		"鉄インゴット" => [265,0],
		"金インゴット" => [266,0],
		"鉄のソード" => [267,0],
		"木のソード" => [268,0],
		"木のスコップ" => [269,0],
		"木のピッケル" => [270,0],
		"木のオノ" => [271,0],
		"石のソード" => [272,0],
		"石のスコップ" => [273,0],
		"石のピッケル" => [274,0],
		"石のオノ" => [275,0],
		"ダイヤのソード" => [276,0],
		"ダイヤのスコップ" => [277,0],
		"ダイヤのピッケル" => [278,0],
		"ダイヤのオノ" => [279,0],
		"木の棒" => [280,0],
		"棒" => [280,0],
		"ボウル" => [281,0],
		"マッシュルームスープ" => [282,0],
		"きのこのスープ" => [282,0],
		"金のソード" => [283,0],
		"金のスコップ" => [284,0],
		"金のピッケル" => [285,0],
		"金のオノ" => [286,0],
		"糸" => [287,0],
		"羽" => [288,0],
		"火薬" => [289,0],
		"木のクワ" => [290,0],
		"石のクワ" => [291,0],
		"鉄のクワ" => [292,0],
		"ダイヤのクワ" => [293,0],
		"金のクワ" => [294,0],
		"麦の種" => [295,0],
		"麦" => [296,0],
		"おいしいパン" => [297,0],
		"革のヘルメット" => [298,0],
		"革のチェストプレート" => [299,0],
		"革のレギンス" => [300,0],
		"革のブーツ" => [301,0],
		"チェーンのヘルメット" => [302,0],
		"チェーンのチェストプレート" => [303,0],
		"チェーンのレギンス" => [304,0],
		"チェーンのブーツ" => [305,0],
		"鉄のヘルメット" => [306,0],
		"鉄のチェストプレート" => [307,0],
		"鉄のレギンス" => [308,0],
		"鉄のブーツ" => [309,0],
		"ダイヤのヘルメット" => [310,0],
		"ダイヤのチェストプレート" => [311,0],
		"ダイヤのレギンス" => [312,0],
		"ダイヤのブーツ" => [313,0],
		"金のヘルメット" => [314,0],
		"金のチェストプレート" => [315,0],
		"金のレギンス" => [316,0],
		"金のブーツ" => [317,0],
		"火打ち石" => [318,0],
		"火打石" => [318,0],
		"生豚肉" => [319,0],
		"焼豚肉" => [320,0],
		"絵画" => [321,0],
		"金のりんご" => [322,0],
		"金りんご" => [322,0],
		"看板" => [323,0],
		"白色のシュルカーボックス"=>[218,0],
		"橙色のシュルカーボックス"=>[218,1],
		"赤紫色のシュルカーボックス"=>[218,2],
		"水色のシュルカーボックス"=>[218,3],
		"黄色のシュルカーボックス"=>[218,4],
		"黄緑色のシュルカーボックス"=>[218,5],
		"桃色のシュルカーボックス"=>[218,6],
		"灰色のシュルカーボックス"=>[218,7],
		"薄灰色のシュルカーボックス"=>[218,8],
		"空色のシュルカーボックス"=>[218,9],
		"紫色のシュルカーボックス"=>[218,10],
		"青色のシュルカーボックス"=>[218,11],
		"茶色のシュルカーボックス"=>[218,12],
		"緑色のシュルカーボックス"=>[218,13],
		"赤色のシュルカーボックス"=>[218,14],
		"黒色のシュルカーボックス"=>[218,15],
		"紫色の彩釉テラコッタ"=>[219,0],
		"白色の彩釉テラコッタ"=>[220,0],
		"橙色の彩釉テラコッタ"=>[221,0],
		"赤紫色の彩釉テラコッタ"=>[222,0],
		"水色の彩釉テラコッタ"=>[223,0],
		"黄緑色の彩釉テラコッタ"=>[225,0],
		"桃色の彩釉テラコッタ"=>[226,0],
		"空色の彩釉テラコッタ"=>[229,0],
		"tile.230.name"=>[230,0],
		"青色の彩釉テラコッタ"=>[231,0],
		"緑色の彩釉テラコッタ"=>[233,0],
		"赤色の彩釉テラコッタ"=>[234,0],
		"黒色の彩釉テラコッタ"=>[235,0],
		"白色のコンクリート"=>[236,0],
		"橙色のコンクリート"=>[236,1],
		"赤紫色のコンクリート"=>[236,2],
		"水色のコンクリート"=>[236,3],
		"黃緑色のコンクリート"=>[236,5],
		"桃色のコンクリート"=>[236,6],
		"空色のコンクリート"=>[236,9],
		"紫色のコンクリート"=>[236,10],
		"青色のコンクリート"=>[236,11],
		"緑色のコンクリート"=>[236,13],
		"赤色のコンクリート"=>[236,14],
		"黒色のコンクリート"=>[236,15],
		"白色のコンクリートパウダー"=>[237,0],
		"橙色のコンクリートパウダー"=>[237,1],
		"赤紫色のコンクリートパウダー"=>[237,2],
		"水色のコンクリートパウダー"=>[237,3],
		"黄色のコンクリートパウダー"=>[237,4],
		"黃緑色のコンクリートパウダー"=>[237,5],
		"桃色のコンクリートパウダー"=>[237,6],
		"灰色のコンクリートパウダー"=>[237,7],
		"薄灰色のコンクリートパウダー"=>[237,8],
		"空色のコンクリートパウダー"=>[237,9],
		"紫色のコンクリートパウダー"=>[237,10],
		"青色のコンクリートパウダー"=>[237,11],
		"茶色のコンクリートパウダー"=>[237,12],
		"緑色のコンクリートパウダー"=>[237,13],
		"赤色のコンクリートパウダー"=>[237,14],
		"黒色のコンクリートパウダー"=>[237,15],
		"tile.238.name"=>[238,0],
		"tile.239.name"=>[239,0],
		"コーラスプラント"=>[240,0],
		"tile.242.name"=>[242,0],
		"ストーンカッター"=>[245,0],
		"ネザーリアクターコア"=>[247,0],
		"オブザーバー"=>[251,0],
		"tile.252.name"=>[252,0],
		"tile.253.name"=>[253,0],
		"tile.254.name"=>[254,0],
		"鉄のシャベル"=>[256,0],
		"鉄のツルハシ"=>[257,0],
		"鉄の斧"=>[258,0],
		"火打ち石と打ち金"=>[259,0],
		"リンゴ"=>[260,0],
		"弓"=>[261,0],
		"矢"=>[262,0],
		"石炭"=>[263,0],
		"ダイヤモンド"=>[264,0],
		"鉄の延べ棒"=>[265,0],
		"金の延べ棒"=>[266,0],
		"鉄の剣"=>[267,0],
		"木の剣"=>[268,0],
		"木のシャベル"=>[269,0],
		"木のツルハシ"=>[270,0],
		"木の斧"=>[271,0],
		"石の剣"=>[272,0],
		"石のシャベル"=>[273,0],
		"石のツルハシ"=>[274,0],
		"石の斧"=>[275,0],
		"ダイヤモンドの剣"=>[276,0],
		"ダイヤモンドのシャベル"=>[277,0],
		"ダイヤモンドのツルハシ"=>[278,0],
		"ダイヤモンドの斧"=>[279,0],
		"棒"=>[280,0],
		"おわん"=>[281,0],
		"きのこシチュー"=>[282,0],
		"金の剣"=>[283,0],
		"金のシャベル"=>[284,0],
		"金のツルハシ"=>[285,0],
		"金の斧"=>[286,0],
		"糸"=>[287,0],
		"羽根"=>[288,0],
		"火薬"=>[289,0],
		"木のくわ"=>[290,0],
		"石のくわ"=>[291,0],
		"鉄のくわ"=>[292,0],
		"ダイヤモンドのくわ"=>[293,0],
		"金のくわ"=>[294,0],
		"種"=>[295,0],
		"小麦"=>[296,0],
		"パン"=>[297,0],
		"革の帽子"=>[298,0],
		"革の服"=>[299,0],
		"革のパンツ"=>[300,0],
		"革のブーツ"=>[301,0],
		"チェーンヘルメット"=>[302,0],
		"チェーンチェストプレート"=>[303,0],
		"チェーンレギンス"=>[304,0],
		"チェーンブーツ"=>[305,0],
		"鉄の兜"=>[306,0],
		"鉄の胸当て"=>[307,0],
		"鉄の脚甲"=>[308,0],
		"鉄のブーツ"=>[309,0],
		"ダイヤモンドの兜"=>[310,0],
		"ダイヤモンドの胸当て"=>[311,0],
		"ダイヤモンドの脚甲"=>[312,0],
		"ダイヤモンドのブーツ"=>[313,0],
		"金の兜"=>[314,0],
		"金の胸当て"=>[315,0],
		"金の脚甲"=>[316,0],
		"金のブーツ"=>[317,0],
		"火打ち石"=>[318,0],
		"生の豚肉"=>[319,0],
		"調理した豚肉"=>[320,0],
		"絵"=>[321,0],
		"金のリンゴ"=>[322,0],
		"看板"=>[323,0],
		"樫の木のドア"=>[324,0],
		"バケツ"=>[325,0],
		"トロッコ"=>[328,0],
		"鞍"=>[329,0],
		"鉄のドア"=>[330,0],
		"レッドストーン"=>[331,0],
		"雪玉"=>[332,0],
		"樫の木のボート"=>[333,0],
		"革"=>[334,0],
		"レンガ"=>[336,0],
		"粘土"=>[337,0],
		"サトウキビ"=>[338,0],
		"紙"=>[339,0],
		"本"=>[340,0],
		"スライムボール"=>[341,0],
		"チェスト付きトロッコ"=>[342,0],
		"タマゴ"=>[344,0],
		"コンパス"=>[345,0],
		"釣り竿"=>[346,0],
		"時計"=>[347,0],
		"グロウストーンダスト"=>[348,0],
		"生魚"=>[349,0],
		"調理した魚"=>[350,0],
		"墨袋"=>[351,0],
		"骨"=>[352,0],
		"砂糖"=>[353,0],
		"ケーキ"=>[354,0],
		"白のベッド"=>[355,0],
		"レッドストーン反復装置"=>[356,0],
		"クッキー"=>[357,0],
		"Map"=>[358,0],
		"ハサミ"=>[359,0],
		"スイカ"=>[360,0],
		"カボチャの種"=>[361,0],
		"スイカの種"=>[362,0],
		"生の牛肉"=>[363,0],
		"調理した牛肉"=>[364,0],
		"生の鶏肉"=>[365,0],
		"焼き鳥"=>[366,0],
		"腐肉"=>[367,0],
		"エンダーパール"=>[368,0],
		"ブレイズ ロッド"=>[369,0],
		"ガストの涙"=>[370,0],
		"金の塊"=>[371,0],
		"ネザーウォート"=>[372,0],
		"水のビン"=>[373,0],
		"ガラスビン"=>[374,0],
		"クモの目"=>[375,0],
		"発酵したクモの目"=>[376,0],
		"ブレイズ パウダー"=>[377,0],
		"マグマクリーム"=>[378,0],
		"調合台"=>[379,0],
		"大釜"=>[380,0],
		"エンダーアイ"=>[381,0],
		"輝くスイカ"=>[382,0],
		"スポーン"=>[383,0],
		"エンチャントのビン"=>[384,0],
		"発火剤"=>[385,0],
		"エメラルド"=>[388,0],
		"額縁"=>[389,0],
		"植木鉢"=>[390,0],
		"ニンジン"=>[391,0],
		"ジャガイモ"=>[392,0],
		"ベイクド ポテト"=>[393,0],
		"有毒なジャガイモ"=>[394,0],
		"空っぽの地図"=>[395,0],
		"金のニンジン"=>[396,0],
		"ガイコツの頭"=>[397,0],
		"ニンジン付きの棒"=>[398,0],
		"ネザースター"=>[399,0],
		"パンプキン パイ"=>[400,0],
		"エンチャントした本"=>[403,0],
		"レッドストーン コンパレーター"=>[404,0],
		"暗黒レンガ"=>[405,0],
		"闇のクォーツ"=>[406,0],
		"TNT 付きトロッコ"=>[407,0],
		"ホッパー付きトロッコ"=>[408,0],
		"暗海晶の破片"=>[409,0],
		"ホッパー"=>[410,0],
		"生の兎肉"=>[411,0],
		"調理した兎肉"=>[412,0],
		"ウサギシチュー"=>[413,0],
		"ウサギの足"=>[414,0],
		"ウサギの皮"=>[415,0],
		"革の馬鎧"=>[416,0],
		"鉄の馬鎧"=>[417,0],
		"金の馬鎧"=>[418,0],
		"ダイヤモンドの馬鎧"=>[419,0],
		"首ひも"=>[420,0],
		"名札"=>[421,0],
		"海結晶"=>[422,0],
		"生の羊肉"=>[423,0],
		"調理した羊肉"=>[424,0],
		"果てのクリスタル"=>[426,0],
		"トウヒの木のドア"=>[427,0],
		"樺の木のドア"=>[428,0],
		"ジャングルの木のドア"=>[429,0],
		"アカシアのドア"=>[430,0],
		"黒樫の木のドア"=>[431,0],
		"コーラス フルーツ"=>[432,0],
		"焼いたコーラス フルーツ"=>[433,0],
		"ドラゴンの息"=>[437,0],
		"スプラッシュ 水のビン"=>[438,0],
		"残留する 水のビン"=>[441,0],
		"コマンドブロック付きトロッコ"=>[443,0],
		"虫の羽根"=>[444,0],
		"シュルカーの殻"=>[445,0],
		"不死のトーテム"=>[450,0],
		"鉄塊"=>[452,0],
		"ビートルート"=>[457,0],
		"ビートルートの種"=>[458,0],
		"ビートルート スープ"=>[459,0],
		"生鮭"=>[460,0],
		"クマノミ"=>[461,0],
		"フグ"=>[462,0],
		"調理した鮭"=>[463,0],
		"エンチャントされたリンゴ"=>[466,0],
		"鉄インゴット"=>[265,0],
		"金インゴット"=>[266,0],
		"ダイヤの剣"=>[276,0],
		"ダイヤのシャベル"=>[277,0],
		"ダイヤのツルハシ"=>[278,0],
		"ダイヤの斧"=>[279,0],
		"ボウル"=>[281,0],
		"キノコシチュー"=>[282,0],
		"羽"=>[288,0],
		"木のクワ"=>[290,0],
		"石のクワ"=>[291,0],
		"鉄のクワ"=>[292,0],
		"ダイヤのクワ"=>[293,0],
		"金のクワ"=>[294,0],
		"革の上着"=>[299,0],
		"革のズボン"=>[300,0],
		"鉄のヘルメット"=>[306,0],
		"鉄のチェストプレート"=>[307,0],
		"鉄のレギンス"=>[308,0],
		"ダイヤのヘルメット"=>[310,0],
		"ダイヤのチェストプレート"=>[311,0],
		"ダイヤのレギンス"=>[312,0],
		"ダイヤのブーツ"=>[313,0],
		"金のヘルメット"=>[314,0],
		"金のチェストプレート"=>[315,0],
		"金のレギンス"=>[316,0],
		"焼き豚"=>[320,0],
		"絵画"=>[321,0],
		"オークのドア"=>[324,0],
		"サドル"=>[329,0],
		"オークのボート"=>[333,0],
		"卵"=>[344,0],
		"釣竿"=>[346,0],
		"グロウストーンの粉"=>[348,0],
		"焼き魚"=>[350,0],
		"イカスミ"=>[351,0],
		"白色のベッド"=>[355,0],
		"レッドストーンリピーター"=>[356,0],
		"ステーキ"=>[364,0],
		"腐った肉"=>[367,0],
		"ブレイズロッド"=>[369,0],
		"金塊"=>[371,0],
		"水入りビン"=>[373,0],
		"ガラス瓶"=>[374,0],
		"ブレイズパウダー"=>[377,0],
		"醸造台"=>[379,0],
		"きらめくスイカ"=>[382,0],
		"スポーン ?"=>[383,0],
		"エンチャントの瓶"=>[384,0],
		"ファイヤーチャージ"=>[385,0],
		"ベイクドポテト"=>[393,0],
		"白紙の地図"=>[395,0],
		"スケルトンの頭蓋骨"=>[397,0],
		"パンプキンパイ"=>[400,0],
		"エンチャントの本"=>[403,0],
		"レッドストーンコンパレーター"=>[404,0],
		"ネザーレンガ"=>[405,0],
		"ネザークォーツ"=>[406,0],
		"プリズマリンの欠片"=>[409,0],
		"焼き兎肉"=>[412,0],
		"ダイヤの馬鎧"=>[419,0],
		"リード"=>[420,0],
		"プリズマリンクリスタル"=>[422,0],
		"焼いた羊肉"=>[424,0],
		"エンドクリスタル"=>[426,0],
		"マツのドア"=>[427,0],
		"シラカバのドア"=>[428,0],
		"ジャングルのドア"=>[429,0],
		"ダークオークのドア"=>[431,0],
		"コーラスフルーツ"=>[432,0],
		"焼いたコーラスフルーツ"=>[433,0],
		"ドラゴンブレス"=>[437,0],
		"スプラッシュ 水入りビン"=>[438,0],
		"残留する 水入りビン"=>[441,0],
		"エリトラ"=>[444,0],
		"ビートルートスープ"=>[459,0],
		"焼き鮭"=>[463,0],
		"エンチャントされたリンゴ"=>[466,0]


	];
	private static $listById = [];
}
