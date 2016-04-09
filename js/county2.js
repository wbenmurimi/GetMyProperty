

function loadSubCounty2(){
	var e = document.getElementById("Property_county2");

	var strUser = e.options[e.selectedIndex].value;
	if (e.selectedIndex == "1") {

		var myArray = new Array('All','Baringo Central','Baringo East','Baringo West','Eldama Ravine','Mochongoi','Mogotio');
		$("#Property_sub_county2").empty().html(' ');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "2") {
        	var myArray = new Array("All","Boment Central","Bomet East","Chepalungu","Konoin","Sotic");
        	$("#Property_sub_county2").empty().html(' ');
        	for(a=0; a<myArray.length; a++) {
        		$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
        	}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "3") {
		$("#Property_sub_county2").empty().html(' ');//clear dropdown
		var myArray = new Array('All','Bokoli','Bumula','Kabuchia','Kandunyi','Kimili','Mt. Elgon','Siria','Tongaren','Webuye');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "4") {
		$("#Property_sub_county2").empty().html(' ');//clear dropdown
		var myArray = new Array('All','Budalangi','Butula','Funyula','Matayos','Nambale','Teso North','Teso South');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "5") {
		$("#Property_sub_county2").empty().html(' ');//clear dropdown
		var myArray = new Array('All','Keiyo East','Keiyo South','Marakwet East','Marakwet West');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "6") {
		$("#Property_sub_county2").empty().html(' ');//clear dropdown
		var myArray = new Array('All','Gachoka','Manyatta','Runyenjes','siakago');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "7") {
		$("#Property_sub_county2").empty().html(' ');//clear dropdown
		var myArray = new Array('All','Balambala','Daadab','Fafi','Ijara','Lagdera','TaveDujis');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "8") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Gwassi','Homabay Town','Kabondo','Karachuonyo','Kasipul','Mbita','Ndhiwa','Rangwe');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "9") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Isiolo North','Isiolo South');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "10") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kajiado Central','Kajiado North','Kajiando south');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "11") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Butere','Ikolomani','Kakamega Town','Khwisero','Likuyani','Lugari','Lurambi','Makholo','Malava','Matungu','Mumias','Mumias East','Shinyalu');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }


        if (e.selectedIndex == "12") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Ainamoi','Belgut','Kikelion');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "13") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Gatundu North','Gatundu South','Juja','Kabete','Kiambaa','Kikuyu','Lari','Limuru','Ruiru Githunguri','Thika Town');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "14") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Ganze','Kaloleni','Kilifi North','Kilifi South','Magarini','Malindi','Rabai');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "15") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Gichugu','Kerugoya','Kirinyaga Central','Mwea','Ndia');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "16") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Bobasi','Bomachoge','Bonchari','Gucha','Matrani','Mosocho','Nyaribari Chache','Nyaribari Masaba','South Mugirango');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "17") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kisumu Central','Kisumu East','Kisumu West','Kogony','Milimani','Muhoroni','Nyakach','Nyalenda','Nyando');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "18") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kitui Rural','Kitui South','Kitui Town','Kitui West','Mutito','Mutitu','Mwingi Central','Mwingi North','Mwingi South');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "19") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Diani','Kinango','Lunga Lunga','Matuga','Msambweni','Ukunda','Vipingo');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "20") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Laikipia East','Laikipia North','Laikipia West');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "21") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Lamu East','Lamu West');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "22") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kangundo','Kathiani','Konza','Machako Town','Masinga','Matungulu','Mavoko','Mwala','Yatta');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "23") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kaiti','Kibwezi East','Kibwezi West','Kilome','Makueni','Mbooni');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "24") {
		$("#Property_sub_county2").empty().html(' ');//clear dropdown
		var myArray = new Array('All','Banisa','Lafey','Mandera East','Mandera North','Mandera West');
		for(a=0; a<myArray.length; a++) {
			$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
		}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "25") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Laisamis','Moyale','North Horr','Saku');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "26") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Buuri','Central Imenti','Igembe Central','Igembe North','Igembe South','North Imenti','South Imenti','Tigania East','Tigania West');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

        if (e.selectedIndex == "27") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Awendo','Kuria East','Kuria West','Migori East','Migori West','Nyatike','Rongo','Uriri');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "28") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Bamburi','Bombolulu','Changamwe','Ganjoni','Jomvu','Kibokoni','Kiembeni','Kilindini','Kisauni','Kizingo',
				'Likoni','Magongo','Makadara','Makupa','Manyimbo','Marina','Mbariki','Mikindani','Miritini','Mkomani','Mombasa Town','Mshomoroni',
				'Mtoanga','Mtwapa','Mvita Kwale','Mwembe Tayari','Nyali','Port Reitz','Shanzu','Tononoka','Tudor','Vok');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "29") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Gatanga','Kandara','Kangema','Kigumo','Kiharu','Maragwa','Mathioya');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "30") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Athi River','Buruburu','CBD','Dagoretti','Donholm','Eastleigh','Embakasi','Garden Estate',
				'Gigiri','Githurai','Hurlinghum','Huruma','Imara Daima','Industrial Area','Kahawa','Kahawa West','Kamukunji','Karen',
				'Kariobangi','Kasarani','Kawangware','Kayole','Kibera','Kileleshwa','Kilimani','Kinoo','Kitengela','Kitusuru','Komarocks',
				'Langata','Lavington','Loresho','Lower Kabete','adaraka','Makandara','Mathare','Mihango','Mlolongo','Muthaiga','Nairobi-West',
				'Ngara','Ngumo','Nyari','Pangani','Parklands','Pumwani','Riverside','Roysambu','Ruaka','Ruaraka','Runda','South B','South C',
				'Spring Valley','Starehe','Syokimau','Umoja','Umoja Innercore','Upper Hill','Utawala','Wetlands','Zimmerman');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "31") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Bahati','Gilgil','Kureoi North','Kureoi South','Molo','Naivasha','Nakuru Town East','Nakuru Town West','Njoro','Rongai','Subukia');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "32") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Aldai','Emgwen North','Mosop','Nandi Hills','Tinderet');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "33") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Emurua Dikirr','Kajiando East','Kajiando West','Kilgoris','Narok North');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "34") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kitutu Masaba','North Mugirango','West Mugirango');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "35") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kinangop','Kipipiri','Ndaragwa','Ol-Jorok','Ol-Kalou');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "36") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kieni','Mathira','Mukurwe-ini','Mukuwe-ini','Nyeri Town','Othaya','Tetu');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "37") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Samburu East','Samburu North','Samburu West');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "38") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Alego Usonga','Bondo','Gem','Rarieda','Ugenya','Ugunja');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "39") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Mwatate','Taveta','Voi','Wundanyi');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "40") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Bura','Galole','Garsen');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "41") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Maara','Nithi','Tharaka');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "42") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Cherenganyi','Edebess','Kiminini','Kwanza','Saboti');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "43") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Loima','Turkana Central','Turkana East','Turkana North','Turkana South','Turkana West');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "44") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Ainabkoi','Eldoret East','Eldoret North','Eldoret South','Kapseret','Kesses','Moiben','Soy','Turbo');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "45") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Emuhaya','Hamisi','Luanda','Sabatia','Vihiga');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "46") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Eldas','Tarbaj','Wajir East','Wajir North','Wajir South','Wajir West');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }
        if (e.selectedIndex == "47") {
			$("#Property_sub_county2").empty().html(' ');//clear dropdown
			var myArray = new Array('All','Kachelibia','Kapenguria','Pokot south','Sigor');
			for(a=0; a<myArray.length; a++) {
				$('#Property_sub_county2').append('<option value="' + myArray[a] +'">' + myArray[a] + '</option>');
			}
            // re-initialize (update)
            $('select').material_select();
        }

    }


