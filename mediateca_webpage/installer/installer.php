<?php
        header("Content-Type:text/html; charset=UTF-8");
	require_once '..\\web\\ini.php';
	
	//SPED(MEDIATECA.CORE);
	
        // Creación de la tabla Campaign
	$campaignTable = new Campaign(); 
        $campaignTable->create();	
              
        // Creación de la tabla MediaCampaign
        $mediaCampaignTable = new MediaCampaign(); 
        $mediaCampaignTable->create();
        
        // Creación de la tabla MediaSupport
        $mediaSupportTable = new MediaSupport(); 
        $mediaSupportTable->create();        
        
        // Creación de la tabla TagCampaign
        $tagCampaignTable = new TagCampaign();
        $tagCampaignTable->create();
        
        // Creación de la tabla Tags
	$tagsTable = new Tags(); 
        $tagsTable->create();
        
        // Creación de la tabla URLCampaign
        $urlCampaignTable = new URLCampaign(); 
        $urlCampaignTable->create();
	
        // Creación de la tabla Advertiser
	$advertiserTable = new Advertiser();
        $advertiserTable->create();
        
        // Creación de la tabla AdvAgency
        $advagencyTable = new AdvAgency();
        $advagencyTable->create(); 
        
        // Creación de la tabla TargetPeople
        $targetPeopleTable = new TargetPeople();
        $targetPeopleTable->create();        
        
        // Creación de la tabla UserRole
        $userRoleTable = new UserRole(); 
        $userRoleTable->create();
       
        // Creación de la tabla User
        $userTable = new User();
        $userTable->create();
        
        //______________ CARGA DE DATOS _______________//
        
        
        //___ USER ROLE ___//

        // Carga de datos en la tabla UserRole
        $userRoleTable = new UserRole();         
	$userRoleTable->name("Administrador");
	$userRoleTable->save();
	
	$userRoleTable = new UserRole();
	$userRoleTable->name("Usuario");
	$userRoleTable->save();		


        //___ USER ___//

        // Carga de datos en la tabla User
	$userTable = new User();
	$userTable->name("Administrador");
	$userTable->password("administrador");
	$userTable->email("administrador@urjc.es");
	$userTable->rol(1);
	$userTable->save();
	
	$userTable = new User();
	$userTable->name("Usuario Básico");
	$userTable->password("usuario");
	$userTable->email("usuario@urjc.es");
	$userTable->rol(2);
	$userTable->save();
        
        
        //___ ADVERTISER ___//
        
        // Carga de datos en la tabla AdvAgency
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Desconocida");
	$advertiserTable->save();
	
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Agricultura, Alimentación y Medio Ambiente");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Asuntos Exteriores y Cooperación");
	$advertiserTable->save();
      
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Defensa");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Economía y Competitividad");
	$advertiserTable->save();

        $advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Educación, Cultura y Deporte");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Empleo y Seguridad Social");
	$advertiserTable->save();

        $advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Fomento");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Hacienda y Administraciones Públicas");
	$advertiserTable->save();

        $advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Justicia");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio de Sanidad, Servicios Sociales e Igualdad");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministerio del Interior");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Ministro de Industria, Energía y Turismo");
	$advertiserTable->save();
        
	$advertiserTable = new AdvAgency();
	$advertiserTable->name("Vicepresidenta del Gobierno, Ministerio de la Presidencia y Portavoz del Gobierno");
	$advertiserTable->save();

        //___ ADVAGENCY ___//
        
        // Carga de datos en la tabla Advertiser
	$advagencyTable = new Advertiser();
	$advagencyTable->name("Desconocida");
	$advagencyTable->campaign($advagencyTable->id());
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Abuso");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Administración Pública");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Administración electrónica");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Aeropuertos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Agricultura");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Agua");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Ahorro");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Alcohol");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Alimentación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Arquitectura");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Asistencia");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Atención al ciudadano");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Automóviles");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Ayudas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("BOE");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Bajas/Altas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Becas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Bibliotecas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Bienes Culturales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Biodiversidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("CCAA");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Calor");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Cambio Climático");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Carnet de puntos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Carreteras");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Casco");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Castellano");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Catástrofes");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Ciclistas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Cine");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Cinturón de Seguridad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Comercio");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Comercio Exterior");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Competitividad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Comunicación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Comunidades Autónomas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Consejo de Ministros");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Constitución");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Consulado");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Consumo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Contratación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Convenio");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Cooperación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Coordinación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Cortes Generales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Costas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Criminalidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Créditos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Cultura");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("DNI");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Datos sanitarios");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Defunción");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Delegaciones de Gobierno");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Dependencia");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Deporte");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Desarrollo Rural");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Desempleo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Discapacidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Documentación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Drogas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Economía");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Educación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Eficiencia");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Elecciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Embajadas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Emergencias");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Emigración");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Empleo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Empleo Público");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Emprendedores");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Empresas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Energía");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Enfermedades");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Epidemias");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Español");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Especies Protegidas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Estudiantes");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Exportación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Exposiciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Exterior");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Extranjería");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Familias");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Fiesta nacional");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Fomento");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Fondos Europeos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Fondos Unión Europea");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Formación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Fundaciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Ganadería");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Genéricos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Gobierno");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Hacienda");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Hidráulicas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("ICO");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("IRPF");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("IVA");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("IVH/SIDA");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Iberoamérica");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Igualdad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Igualdad de género");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Impuestos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Incendios");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Incendios Forestales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Industria");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Infancia");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Infecciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Información");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Información pública");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Infraestructuras");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Inmigración");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Innovación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Inspección");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Investigación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Justicia");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Juventud");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Lectura");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Legislación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Legislación Laboral");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Letras del Tesoro");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Libro");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Marca España");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Mayores");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Medicamentos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Medio Ambiente");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Medio rural");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Memoria Histórica");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Menores");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Misiones internacionales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Moneda y timbre");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Motocicletas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Mujer militar");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Mujeres");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Mujeres Rurales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Multas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Museos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Música");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Nacionalidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Normas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Náutica");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Obras Públicas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Oceanográfica");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Paradores");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Parques Nacionales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Pasaporte");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Pasaporte/DNI");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Patrimonio");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Patrimonio Nacional");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Pesca");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Portavoz");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Premios");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Presidente");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Prestaciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Presupuestos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Prevención");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Prevención de riesgos Cotización");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Prisiones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Profesionales sanitarios");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Profesión/Carrera");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Profesores/Maestros");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Programas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Protección Civil");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Protección de datos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Publicaciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Publicidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Puertos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Racismo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Reclutamiento");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Reforma Laboral");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Reformas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Registro");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Salud Mental");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Sanidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Seguridad Vial");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Seguridad del Estado");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Seguridad laboral");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Seguridad social");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Seguridad y defensa");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Servicios Sociales");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Soldado");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Sostenibilidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Suelo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Tabaco");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Teatro");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Tecnología");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Telecomunicaciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Terrorismo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Tesoro Público");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Titulaciones");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Transparencia");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Transportes");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Trata de mujeres");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Tren");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Tributos");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Tráfico");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Turespaña");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Turismo");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Universidades");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Unión Europea");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Unión europea");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Vacunación");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Vacunas");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Velocidad");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Viajar");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Viajes");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Violencia de género");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Vivienda");
	$advagencyTable->save();

	$advagencyTable = new Advertiser();
	$advagencyTable->name("Víctimas");
	$advagencyTable->save();

        //___ MEDIA SUPPORT ___//
        
        // Carga de datos de la tabla MediaSupport        
	$mediaSupportTable = new MediaSupport();
	$mediaSupportTable->name("Publicidad en Radio");
	$mediaSupportTable->save();
        
	$mediaSupportTable = new MediaSupport();
	$mediaSupportTable->name("Publicidad en Televisión");
	$mediaSupportTable->save();
        
	$mediaSupportTable = new MediaSupport();
	$mediaSupportTable->name("Publicidad en Prensa");
	$mediaSupportTable->save();

        $mediaSupportTable = new MediaSupport();
	$mediaSupportTable->name("Publicidad en Exteriores");
	$mediaSupportTable->save();
        
        $mediaSupportTable = new MediaSupport();
	$mediaSupportTable->name("Publicidad en Internet");
	$mediaSupportTable->save();        

        //___ TARGET PEOPLE ___/
        
        // Carga de datos de la tabla Target People
        
        $targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Desconocido");
	$targetPeopleTable->save();
        
	$targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Público en general");
	$targetPeopleTable->save();
	
	$targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Menores");
	$targetPeopleTable->save();
	
	$targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Adolescentes");
	$targetPeopleTable->save();
	
	$targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Profesionales");
	$targetPeopleTable->save();
	
	$targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Padres");
	$targetPeopleTable->save();
		
	$targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Tercera Edad");
	$targetPeopleTable->save();
	
        $targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Trabajadores");
	$targetPeopleTable->save();
        
        $targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Homosexuales");
	$targetPeopleTable->save();
        
        $targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Empresarios");
	$targetPeopleTable->save();
        
        $targetPeopleTable = new TargetPeople();
	$targetPeopleTable->name("Inmigrantes");
	$targetPeopleTable->save();
        if (!file_exists(CONFIG::$path_uploads)) mkdir (CONFIG::$path_uploads);
        if (!file_exists(CONFIG::$path_remote_uploads)) mkdir (CONFIG::$path_remote_uploads);
?>