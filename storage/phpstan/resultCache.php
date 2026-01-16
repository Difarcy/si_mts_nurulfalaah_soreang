<?php declare(strict_types = 1);

return [
	'lastFullAnalysisTime' => 1768190421,
	'meta' => array (
  'cacheVersion' => 'v12-linesToIgnore',
  'phpstanVersion' => '2.1.33',
  'metaExtensions' => 
  array (
  ),
  'phpVersion' => 80501,
  'projectConfig' => '{conditionalTags: {Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule: {phpstan.rules.rule: %noEnvCallsOutsideOfConfig%}, Larastan\\Larastan\\Rules\\NoModelMakeRule: {phpstan.rules.rule: %noModelMake%}, Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule: {phpstan.rules.rule: %noUnnecessaryCollectionCall%}, Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule: {phpstan.rules.rule: %noUnnecessaryEnumerableToArrayCalls%}, Larastan\\Larastan\\Rules\\OctaneCompatibilityRule: {phpstan.rules.rule: %checkOctaneCompatibility%}, Larastan\\Larastan\\Rules\\UnusedViewsRule: {phpstan.rules.rule: %checkUnusedViews%}, Larastan\\Larastan\\Rules\\NoMissingTranslationsRule: {phpstan.rules.rule: %checkMissingTranslations%}, Larastan\\Larastan\\Rules\\ModelAppendsRule: {phpstan.rules.rule: %checkModelAppends%}, Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule: {phpstan.rules.rule: %checkModelMethodVisibility%}, Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule: {phpstan.rules.rule: %checkAuthCallsWhenInRequestScope%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %generalizeEnvReturnType%}, Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension: {phpstan.broker.dynamicFunctionReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension: {phpstan.broker.dynamicMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension: {phpstan.broker.dynamicStaticMethodReturnTypeExtension: %checkConfigTypes%}, Larastan\\Larastan\\Rules\\ConfigCollectionRule: {phpstan.rules.rule: %checkConfigTypes%}}, parameters: {universalObjectCratesClasses: [Illuminate\\Http\\Request, Illuminate\\Support\\Optional], earlyTerminatingFunctionCalls: [abort, dd], mixinExcludeClasses: [Eloquent], bootstrapFiles: [bootstrap.php], checkOctaneCompatibility: false, noEnvCallsOutsideOfConfig: true, noModelMake: true, noUnnecessaryCollectionCall: true, noUnnecessaryCollectionCallOnly: [], noUnnecessaryCollectionCallExcept: [], noUnnecessaryEnumerableToArrayCalls: false, squashedMigrationsPath: [], databaseMigrationsPath: [], disableMigrationScan: false, disableSchemaScan: false, configDirectories: [], viewDirectories: [], translationDirectories: [], checkModelProperties: false, checkUnusedViews: false, checkMissingTranslations: false, checkModelAppends: true, checkModelMethodVisibility: false, generalizeEnvReturnType: false, checkConfigTypes: false, checkAuthCallsWhenInRequestScope: false, level: 6, paths: [C:\\Project\\mts-nurul-falaah-soreang\\app, C:\\Project\\mts-nurul-falaah-soreang\\database, C:\\Project\\mts-nurul-falaah-soreang\\routes], tmpDir: C:\\Project\\mts-nurul-falaah-soreang\\storage\\phpstan, excludePaths: {analyseAndScan: [vendor, storage, bootstrap/cache], analyse: []}}, rules: [Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessWithFunctionCallsRule, Larastan\\Larastan\\Rules\\UselessConstructs\\NoUselessValueFunctionCallsRule, Larastan\\Larastan\\Rules\\DeferrableServiceProviderMissingProvidesRule, Larastan\\Larastan\\Rules\\ConsoleCommand\\UndefinedArgumentOrOptionRule], services: {{class: Larastan\\Larastan\\Methods\\RelationForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\EloquentBuilderForwardsCallsExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderTapProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\HigherOrderCollectionProxyExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\StorageMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\Extension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ModelFactoryMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\RedirectResponseMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\MacroMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Methods\\ViewWithMethodsClassReflectionExtension, tags: [phpstan.broker.methodsClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelAccessorExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\ModelPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\Properties\\HigherOrderCollectionProxyPropertyExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\HigherOrderTapProxyExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Container\\Container}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerArrayAccessDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {className: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\Properties\\ModelRelationsExtension, tags: [phpstan.broker.propertiesClassReflectionExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelOnlyDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelFactoryDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ModelDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AuthManagerExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DateExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\GuardExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestFileExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestRouteExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RequestUserExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\EloquentBuilderExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\RelationCollectionExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TestCaseExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Support\\CollectionHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AuthExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\CollectExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\NowAndTodayExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ResponseExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValidatorExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\LiteralExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionFilterRejectDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\CollectionWhereNotNullDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\NewModelQueryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\FactoryDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: abort, negate: true}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: false}}, {class: Larastan\\Larastan\\Types\\AbortIfFunctionTypeSpecifyingExtension, tags: [phpstan.typeSpecifier.functionTypeSpecifyingExtension], arguments: {methodName: throw, negate: true}}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\AppExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ValueExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\StrExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\TapExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\StorageDynamicStaticMethodReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\GenericEloquentCollectionTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Types\\ViewStringTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Rules\\OctaneCompatibilityRule}, {class: Larastan\\Larastan\\Rules\\NoEnvCallsOutsideOfConfigRule, arguments: {configDirectories: %configDirectories%}}, {class: Larastan\\Larastan\\Rules\\NoModelMakeRule}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryCollectionCallRule, arguments: {onlyMethods: %noUnnecessaryCollectionCallOnly%, excludeMethods: %noUnnecessaryCollectionCallExcept%}}, {class: Larastan\\Larastan\\Rules\\NoUnnecessaryEnumerableToArrayCallsRule}, {class: Larastan\\Larastan\\Rules\\ModelAppendsRule}, {class: Larastan\\Larastan\\Rules\\NoPublicModelScopeAndAccessorRule}, {class: Larastan\\Larastan\\Types\\GenericEloquentBuilderTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension], arguments: {class: Illuminate\\Contracts\\Foundation\\Application}}, {class: Larastan\\Larastan\\ReturnTypes\\AppFacadeEnvironmentReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Types\\ModelProperty\\ModelPropertyTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension], arguments: {active: %checkModelProperties%}}, {class: Larastan\\Larastan\\Types\\CollectionOf\\CollectionOfTypeNodeResolverExtension, tags: [phpstan.phpDoc.typeNodeResolverExtension]}, {class: Larastan\\Larastan\\Properties\\MigrationHelper, arguments: {databaseMigrationPath: %databaseMigrationsPath%, disableMigrationScan: %disableMigrationScan%, parser: @migrationsParser, reflectionProvider: @reflectionProvider}}, iamcalSqlParser: {class: Larastan\\Larastan\\SQL\\IamcalSqlParser, autowired: false}, sqlParserFactory: {class: Larastan\\Larastan\\SQL\\SqlParserFactory, arguments: {iamcalSqlParser: @iamcalSqlParser}}, sqlParser: {type: Larastan\\Larastan\\SQL\\SqlParser, factory: [@sqlParserFactory, create]}, {class: Larastan\\Larastan\\Properties\\SquashedMigrationHelper, arguments: {schemaPaths: %squashedMigrationsPath%, disableSchemaScan: %disableSchemaScan%}}, {class: Larastan\\Larastan\\Properties\\ModelCastHelper}, {class: Larastan\\Larastan\\Properties\\ModelPropertyHelper}, {class: Larastan\\Larastan\\Rules\\ModelRuleHelper}, {class: Larastan\\Larastan\\Methods\\BuilderHelper, arguments: {checkProperties: %checkModelProperties%}}, {class: Larastan\\Larastan\\Rules\\RelationExistenceRule, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Bus\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Rules\\CheckDispatchArgumentTypesCompatibleWithClassConstructorRule, arguments: {dispatchableClass: Illuminate\\Foundation\\Events\\Dispatchable}, tags: [phpstan.rules.rule]}, {class: Larastan\\Larastan\\Properties\\Schema\\MySqlDataTypeToPhpTypeConverter}, {class: Larastan\\Larastan\\LarastanStubFilesExtension, tags: [phpstan.stubFilesExtension]}, {class: Larastan\\Larastan\\Rules\\UnusedViewsRule}, {class: Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedEmailViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewFacadeMakeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedRouteFacadeViewCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedViewInAnotherViewCollector}, {class: Larastan\\Larastan\\Support\\ViewFileHelper, arguments: {viewDirectories: %viewDirectories%}}, {class: Larastan\\Larastan\\Support\\ViewParser, arguments: {parser: @currentPhpVersionSimpleDirectParser}}, {class: Larastan\\Larastan\\Rules\\NoMissingTranslationsRule, arguments: {translationDirectories: %translationDirectories%}}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFunctionCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationTranslatorCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationFacadeCollector, tags: [phpstan.collector]}, {class: Larastan\\Larastan\\Collectors\\UsedTranslationViewCollector}, {class: Larastan\\Larastan\\ReturnTypes\\ApplicationMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ContainerMakeDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\ArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasArgumentDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\OptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\ConsoleCommand\\HasOptionDynamicReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TranslatorGetReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\LangGetReturnTypeExtension, tags: [phpstan.broker.dynamicStaticMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\TransHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\DoubleUnderscoreHelperReturnTypeExtension, tags: [phpstan.broker.dynamicFunctionReturnTypeExtension]}, {class: Larastan\\Larastan\\ReturnTypes\\AppMakeHelper}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationResolver}, {class: Larastan\\Larastan\\Internal\\ConsoleApplicationHelper}, {class: Larastan\\Larastan\\Support\\HigherOrderCollectionProxyHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\ConfigFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigRepositoryDynamicMethodReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\ConfigFacadeCollectionDynamicStaticMethodReturnTypeExtension}, {class: Larastan\\Larastan\\Support\\ConfigParser, arguments: {parser: @currentPhpVersionSimpleDirectParser, configPaths: %configDirectories%}}, {class: Larastan\\Larastan\\Internal\\ConfigHelper}, {class: Larastan\\Larastan\\ReturnTypes\\Helpers\\EnvFunctionDynamicFunctionReturnTypeExtension}, {class: Larastan\\Larastan\\ReturnTypes\\FormRequestSafeDynamicMethodReturnTypeExtension, tags: [phpstan.broker.dynamicMethodReturnTypeExtension]}, {class: Larastan\\Larastan\\Rules\\NoAuthFacadeInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\NoAuthHelperInRequestScopeRule}, {class: Larastan\\Larastan\\Rules\\ConfigCollectionRule}, {class: Illuminate\\Filesystem\\Filesystem, autowired: self}, migrationsParser: {class: PHPStan\\Parser\\CachedParser, arguments: {originalParser: @currentPhpVersionSimpleDirectParser, cachedNodesByStringCountMax: %cache.nodesByStringCountMax%}, autowired: false}}}',
  'analysedPaths' => 
  array (
    0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app',
    1 => 'C:\\Project\\mts-nurul-falaah-soreang\\database',
    2 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes',
  ),
  'scannedFiles' => 
  array (
  ),
  'composerLocks' => 
  array (
    'C:/Project/mts-nurul-falaah-soreang/composer.lock' => 'e0ebaff9e4dcaa0a4cb30b4e9416bf39ddb86e34',
  ),
  'composerInstalled' => 
  array (
    'C:/Project/mts-nurul-falaah-soreang/vendor/composer/installed.php' => 
    array (
      'versions' => 
      array (
        'amphp/amp' => 
        array (
          'pretty_version' => 'v3.1.1',
          'version' => '3.1.1.0',
          'reference' => 'fa0ab33a6f47a82929c38d03ca47ebb71086a93f',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/amp',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/byte-stream' => 
        array (
          'pretty_version' => 'v2.1.2',
          'version' => '2.1.2.0',
          'reference' => '55a6bd071aec26fa2a3e002618c20c35e3df1b46',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/byte-stream',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/cache' => 
        array (
          'pretty_version' => 'v2.0.1',
          'version' => '2.0.1.0',
          'reference' => '46912e387e6aa94933b61ea1ead9cf7540b7797c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/dns' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => '78eb3db5fc69bf2fc0cb503c4fcba667bc223c71',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/dns',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/parallel' => 
        array (
          'pretty_version' => 'v2.3.3',
          'version' => '2.3.3.0',
          'reference' => '296b521137a54d3a02425b464e5aee4c93db2c60',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/parallel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/parser' => 
        array (
          'pretty_version' => 'v1.1.1',
          'version' => '1.1.1.0',
          'reference' => '3cf1f8b32a0171d4b1bed93d25617637a77cded7',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/pipeline' => 
        array (
          'pretty_version' => 'v1.2.3',
          'version' => '1.2.3.0',
          'reference' => '7b52598c2e9105ebcddf247fc523161581930367',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/pipeline',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/process' => 
        array (
          'pretty_version' => 'v2.0.3',
          'version' => '2.0.3.0',
          'reference' => '52e08c09dec7511d5fbc1fb00d3e4e79fc77d58d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/serialization' => 
        array (
          'pretty_version' => 'v1.0.0',
          'version' => '1.0.0.0',
          'reference' => '693e77b2fb0b266c3c7d622317f881de44ae94a1',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/serialization',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/socket' => 
        array (
          'pretty_version' => 'v2.3.1',
          'version' => '2.3.1.0',
          'reference' => '58e0422221825b79681b72c50c47a930be7bf1e1',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/socket',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'amphp/sync' => 
        array (
          'pretty_version' => 'v2.3.0',
          'version' => '2.3.0.0',
          'reference' => '217097b785130d77cfcc58ff583cf26cd1770bf1',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../amphp/sync',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'brick/math' => 
        array (
          'pretty_version' => '0.14.1',
          'version' => '0.14.1.0',
          'reference' => 'f05858549e5f9d7bb45875a75583240a38a281d0',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../brick/math',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'carbonphp/carbon-doctrine-types' => 
        array (
          'pretty_version' => '3.2.0',
          'version' => '3.2.0.0',
          'reference' => '18ba5ddfec8976260ead6e866180bd5d2f71aa1d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../carbonphp/carbon-doctrine-types',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'composer/pcre' => 
        array (
          'pretty_version' => '3.3.2',
          'version' => '3.3.2.0',
          'reference' => 'b2bed4734f0cc156ee1fe9c0da2550420d99a21e',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/./pcre',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/semver' => 
        array (
          'pretty_version' => '3.4.4',
          'version' => '3.4.4.0',
          'reference' => '198166618906cb2de69b95d7d47e5fa8aa1b2b95',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/./semver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'composer/xdebug-handler' => 
        array (
          'pretty_version' => '3.0.5',
          'version' => '3.0.5.0',
          'reference' => '6c1925561632e83d60a44492e0b344cf48ab85ef',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/./xdebug-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'cordoval/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'danog/advanced-json-rpc' => 
        array (
          'pretty_version' => 'v3.2.2',
          'version' => '3.2.2.0',
          'reference' => 'aadb1c4068a88c3d0530cfe324b067920661efcb',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../danog/advanced-json-rpc',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'davedevelopment/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'daverandom/libdns' => 
        array (
          'pretty_version' => 'v2.1.0',
          'version' => '2.1.0.0',
          'reference' => 'b84c94e8fe6b7ee4aecfe121bfe3b6177d303c8a',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../daverandom/libdns',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'dflydev/dot-access-data' => 
        array (
          'pretty_version' => 'v3.0.3',
          'version' => '3.0.3.0',
          'reference' => 'a23a2bf4f31d3518f3ecb38660c95715dfead60f',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../dflydev/dot-access-data',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dnoegel/php-xdg-base-dir' => 
        array (
          'pretty_version' => 'v0.1.1',
          'version' => '0.1.1.0',
          'reference' => '8f8a6e48c5ecb0f991c2fdcf5f154a47d85f9ffd',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../dnoegel/php-xdg-base-dir',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/deprecations' => 
        array (
          'pretty_version' => '1.1.5',
          'version' => '1.1.5.0',
          'reference' => '459c2f5dd3d6a4633d3b5f46ee2b1c40f57d3f38',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../doctrine/deprecations',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'doctrine/inflector' => 
        array (
          'pretty_version' => '2.1.0',
          'version' => '2.1.0.0',
          'reference' => '6d6c96277ea252fc1304627204c3d5e6e15faa3b',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../doctrine/inflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'doctrine/lexer' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => '31ad66abc0fc9e1a1f2d9bc6a42668d2fbbcd6dd',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../doctrine/lexer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'dragonmantank/cron-expression' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => 'd61a8a9604ec1f8c3d150d09db6ce98b32675013',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../dragonmantank/cron-expression',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'egulias/email-validator' => 
        array (
          'pretty_version' => '4.0.4',
          'version' => '4.0.4.0',
          'reference' => 'd42c8731f0624ad6bdc8d3e5e9a4524f68801cfa',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../egulias/email-validator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'fakerphp/faker' => 
        array (
          'pretty_version' => 'v1.24.1',
          'version' => '1.24.1.0',
          'reference' => 'e0ee18eb1e6dc3cda3ce9fd97e5a0689a88a64b5',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../fakerphp/faker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'felixfbecker/language-server-protocol' => 
        array (
          'pretty_version' => 'v1.5.3',
          'version' => '1.5.3.0',
          'reference' => 'a9e113dbc7d849e35b8776da39edaf4313b7b6c9',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../felixfbecker/language-server-protocol',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'felixfbecker/php-advanced-json-rpc' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '^3',
          ),
        ),
        'fidry/cpu-core-counter' => 
        array (
          'pretty_version' => '1.3.0',
          'version' => '1.3.0.0',
          'reference' => 'db9508f7b1474469d9d3c53b86f817e344732678',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../fidry/cpu-core-counter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'filp/whoops' => 
        array (
          'pretty_version' => '2.18.4',
          'version' => '2.18.4.0',
          'reference' => 'd2102955e48b9fd9ab24280a7ad12ed552752c4d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../filp/whoops',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'fruitcake/php-cors' => 
        array (
          'pretty_version' => 'v1.4.0',
          'version' => '1.4.0.0',
          'reference' => '38aaa6c3fd4c157ffe2a4d10aa8b9b16ba8de379',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../fruitcake/php-cors',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'graham-campbell/result-type' => 
        array (
          'pretty_version' => 'v1.1.4',
          'version' => '1.1.4.0',
          'reference' => 'e01f4a821471308ba86aa202fed6698b6b695e3b',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../graham-campbell/result-type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/guzzle' => 
        array (
          'pretty_version' => '7.10.0',
          'version' => '7.10.0.0',
          'reference' => 'b51ac707cfa420b7bfd4e4d5e510ba8008e822b4',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../guzzlehttp/guzzle',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/promises' => 
        array (
          'pretty_version' => '2.3.0',
          'version' => '2.3.0.0',
          'reference' => '481557b130ef3790cf82b713667b43030dc9c957',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../guzzlehttp/promises',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/psr7' => 
        array (
          'pretty_version' => '2.8.0',
          'version' => '2.8.0.0',
          'reference' => '21dc724a0583619cd1652f673303492272778051',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../guzzlehttp/psr7',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'guzzlehttp/uri-template' => 
        array (
          'pretty_version' => 'v1.0.5',
          'version' => '1.0.5.0',
          'reference' => '4f4bbd4e7172148801e76e3decc1e559bdee34e1',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../guzzlehttp/uri-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'hamcrest/hamcrest-php' => 
        array (
          'pretty_version' => 'v2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'f8b1c0173b22fa6ec77a81fe63e5b01eba7e6487',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../hamcrest/hamcrest-php',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'iamcal/sql-parser' => 
        array (
          'pretty_version' => 'v0.6',
          'version' => '0.6.0.0',
          'reference' => '947083e2dca211a6f12fb1beb67a01e387de9b62',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../iamcal/sql-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'illuminate/auth' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/broadcasting' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/bus' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/cache' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/collections' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/concurrency' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/conditionable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/config' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/console' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/container' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/contracts' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/cookie' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/database' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/encryption' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/events' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/filesystem' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/hashing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/http' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/json-schema' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/log' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/macroable' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/mail' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/notifications' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/pagination' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/pipeline' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/process' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/queue' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/redis' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/reflection' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/routing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/session' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/support' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/testing' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/translation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/validation' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'illuminate/view' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => 'v12.46.0',
          ),
        ),
        'kelunik/certificate' => 
        array (
          'pretty_version' => 'v1.1.3',
          'version' => '1.1.3.0',
          'reference' => '7e00d498c264d5eb4f78c69f41c8bd6719c0199e',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../kelunik/certificate',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'kodova/hamcrest-php' => 
        array (
          'dev_requirement' => true,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'larastan/larastan' => 
        array (
          'pretty_version' => 'v3.8.1',
          'version' => '3.8.1.0',
          'reference' => 'ff3725291bc4c7e6032b5a54776e3e5104c86db9',
          'type' => 'phpstan-extension',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../larastan/larastan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/framework' => 
        array (
          'pretty_version' => 'v12.46.0',
          'version' => '12.46.0.0',
          'reference' => '9dcff48d25a632c1fadb713024c952fec489c4ae',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/framework',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/pail' => 
        array (
          'pretty_version' => 'v1.2.4',
          'version' => '1.2.4.0',
          'reference' => '49f92285ff5d6fc09816e976a004f8dec6a0ea30',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/pail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/pint' => 
        array (
          'pretty_version' => 'v1.26.0',
          'version' => '1.26.0.0',
          'reference' => '69dcca060ecb15e4b564af63d1f642c81a241d6f',
          'type' => 'project',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/pint',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/prompts' => 
        array (
          'pretty_version' => 'v0.3.8',
          'version' => '0.3.8.0',
          'reference' => '096748cdfb81988f60090bbb839ce3205ace0d35',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/prompts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/sail' => 
        array (
          'pretty_version' => 'v1.51.0',
          'version' => '1.51.0.0',
          'reference' => '1c74357df034e869250b4365dd445c9f6ba5d068',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/sail',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'laravel/serializable-closure' => 
        array (
          'pretty_version' => 'v2.0.7',
          'version' => '2.0.7.0',
          'reference' => 'cb291e4c998ac50637c7eeb58189c14f5de5b9dd',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/serializable-closure',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'laravel/tinker' => 
        array (
          'pretty_version' => 'v2.10.2',
          'version' => '2.10.2.0',
          'reference' => '3bcb5f62d6f837e0f093a601e26badafb127bd4c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../laravel/tinker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/commonmark' => 
        array (
          'pretty_version' => '2.8.0',
          'version' => '2.8.0.0',
          'reference' => '4efa10c1e56488e658d10adf7b7b7dcd19940bfb',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/commonmark',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/config' => 
        array (
          'pretty_version' => 'v1.2.0',
          'version' => '1.2.0.0',
          'reference' => '754b3604fb2984c71f4af4a9cbe7b57f346ec1f3',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/config',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem' => 
        array (
          'pretty_version' => '3.30.2',
          'version' => '3.30.2.0',
          'reference' => '5966a8ba23e62bdb518dd9e0e665c2dbd4b5b277',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/flysystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/flysystem-local' => 
        array (
          'pretty_version' => '3.30.2',
          'version' => '3.30.2.0',
          'reference' => 'ab4f9d0d672f601b102936aa728801dd1a11968d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/flysystem-local',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/mime-type-detection' => 
        array (
          'pretty_version' => '1.16.0',
          'version' => '1.16.0.0',
          'reference' => '2d6702ff215bf922936ccc1ad31007edc76451b9',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/mime-type-detection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri' => 
        array (
          'pretty_version' => '7.7.0',
          'version' => '7.7.0.0',
          'reference' => '8d587cddee53490f9b82bf203d3a9aa7ea4f9807',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/uri',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'league/uri-interfaces' => 
        array (
          'pretty_version' => '7.7.0',
          'version' => '7.7.0.0',
          'reference' => '62ccc1a0435e1c54e10ee6022df28d6c04c2946c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../league/uri-interfaces',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mockery/mockery' => 
        array (
          'pretty_version' => '1.6.12',
          'version' => '1.6.12.0',
          'reference' => '1f4efdd7d3beafe9807b08156dfcb176d18f1699',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../mockery/mockery',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'monolog/monolog' => 
        array (
          'pretty_version' => '3.10.0',
          'version' => '3.10.0.0',
          'reference' => 'b321dd6749f0bf7189444158a3ce785cc16d69b0',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../monolog/monolog',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'mtdowling/cron-expression' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '^1.0',
          ),
        ),
        'myclabs/deep-copy' => 
        array (
          'pretty_version' => '1.13.4',
          'version' => '1.13.4.0',
          'reference' => '07d290f0c47959fd5eed98c95ee5602db07e0b6a',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../myclabs/deep-copy',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nesbot/carbon' => 
        array (
          'pretty_version' => '3.11.0',
          'version' => '3.11.0.0',
          'reference' => 'bdb375400dcd162624531666db4799b36b64e4a1',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../nesbot/carbon',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'netresearch/jsonmapper' => 
        array (
          'pretty_version' => 'v5.0.0',
          'version' => '5.0.0.0',
          'reference' => '8c64d8d444a5d764c641ebe97e0e3bc72b25bf6c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../netresearch/jsonmapper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nette/schema' => 
        array (
          'pretty_version' => 'v1.3.3',
          'version' => '1.3.3.0',
          'reference' => '2befc2f42d7c715fd9d95efc31b1081e5d765004',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../nette/schema',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nette/utils' => 
        array (
          'pretty_version' => 'v4.1.1',
          'version' => '4.1.1.0',
          'reference' => 'c99059c0315591f1a0db7ad6002000288ab8dc72',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../nette/utils',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nikic/php-parser' => 
        array (
          'pretty_version' => 'v5.7.0',
          'version' => '5.7.0.0',
          'reference' => 'dca41cd15c2ac9d055ad70dbfd011130757d1f82',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../nikic/php-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'nunomaduro/collision' => 
        array (
          'pretty_version' => 'v8.8.3',
          'version' => '8.8.3.0',
          'reference' => '1dc9e88d105699d0fee8bb18890f41b274f6b4c4',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../nunomaduro/collision',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'nunomaduro/termwind' => 
        array (
          'pretty_version' => 'v2.3.3',
          'version' => '2.3.3.0',
          'reference' => '6fb2a640ff502caace8e05fd7be3b503a7e1c017',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../nunomaduro/termwind',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phar-io/manifest' => 
        array (
          'pretty_version' => '2.0.4',
          'version' => '2.0.4.0',
          'reference' => '54750ef60c58e43759730615a392c31c80e23176',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phar-io/manifest',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phar-io/version' => 
        array (
          'pretty_version' => '3.2.1',
          'version' => '3.2.1.0',
          'reference' => '4f7fd7836c6f332bb2933569e566a0d6c4cbed74',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phar-io/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-common' => 
        array (
          'pretty_version' => '2.2.0',
          'version' => '2.2.0.0',
          'reference' => '1d01c49d4ed62f25aa84a747ad35d5a16924662b',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpdocumentor/reflection-common',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/reflection-docblock' => 
        array (
          'pretty_version' => '5.6.6',
          'version' => '5.6.6.0',
          'reference' => '5cee1d3dfc2d2aa6599834520911d246f656bcb8',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpdocumentor/reflection-docblock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpdocumentor/type-resolver' => 
        array (
          'pretty_version' => '1.12.0',
          'version' => '1.12.0.0',
          'reference' => '92a98ada2b93d9b201a613cb5a33584dde25f195',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpdocumentor/type-resolver',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpoption/phpoption' => 
        array (
          'pretty_version' => '1.9.5',
          'version' => '1.9.5.0',
          'reference' => '75365b91986c2405cf5e1e012c5595cd487a98be',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpoption/phpoption',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'phpstan/phpdoc-parser' => 
        array (
          'pretty_version' => '2.3.0',
          'version' => '2.3.0.0',
          'reference' => '1e0cd5370df5dd2e556a36b9c62f62e555870495',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpstan/phpdoc-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpstan/phpstan' => 
        array (
          'pretty_version' => '2.1.33',
          'version' => '2.1.33.0',
          'reference' => '9e800e6bee7d5bd02784d4c6069b48032d16224f',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpstan/phpstan',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-code-coverage' => 
        array (
          'pretty_version' => '11.0.11',
          'version' => '11.0.11.0',
          'reference' => '4f7722aa9a7b76aa775e2d9d4e95d1ea16eeeef4',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpunit/php-code-coverage',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-file-iterator' => 
        array (
          'pretty_version' => '5.1.0',
          'version' => '5.1.0.0',
          'reference' => '118cfaaa8bc5aef3287bf315b6060b1174754af6',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpunit/php-file-iterator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-invoker' => 
        array (
          'pretty_version' => '5.0.1',
          'version' => '5.0.1.0',
          'reference' => 'c1ca3814734c07492b3d4c5f794f4b0995333da2',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpunit/php-invoker',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-text-template' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '3e0404dc6b300e6bf56415467ebcb3fe4f33e964',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpunit/php-text-template',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/php-timer' => 
        array (
          'pretty_version' => '7.0.1',
          'version' => '7.0.1.0',
          'reference' => '3b415def83fbcb41f991d9ebf16ae4ad8b7837b3',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpunit/php-timer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'phpunit/phpunit' => 
        array (
          'pretty_version' => '11.5.46',
          'version' => '11.5.46.0',
          'reference' => '75dfe79a2aa30085b7132bb84377c24062193f33',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../phpunit/phpunit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'psalm/psalm' => 
        array (
          'dev_requirement' => true,
          'provided' => 
          array (
            0 => '6.14.3',
          ),
        ),
        'psr/clock' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'e41a24703d4560fd0acb709162f73b8adfc3aa0d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/clock-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/container' => 
        array (
          'pretty_version' => '2.0.2',
          'version' => '2.0.2.0',
          'reference' => 'c71ecc56dfe541dbd90c5360474fbc405f8d5963',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/container',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/container-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.1|2.0',
          ),
        ),
        'psr/event-dispatcher' => 
        array (
          'pretty_version' => '1.0.0',
          'version' => '1.0.0.0',
          'reference' => 'dbefd12671e8a14ec7f180cab83036ed26714bb0',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-client' => 
        array (
          'pretty_version' => '1.0.3',
          'version' => '1.0.3.0',
          'reference' => 'bb5906edc1c324c9a05aa0873d40117941e5fa90',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/http-client',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-client-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-factory' => 
        array (
          'pretty_version' => '1.1.0',
          'version' => '1.1.0.0',
          'reference' => '2b4765fddfe3b508ac62f829e852b1501d3f6e8a',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/http-factory',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-factory-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/http-message' => 
        array (
          'pretty_version' => '2.0',
          'version' => '2.0.0.0',
          'reference' => '402d35bcb92c70c026d1a6a9883f06b2ead23d71',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/http-message',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/http-message-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0',
          ),
        ),
        'psr/log' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => 'f16e1d5863e37f8d8c2a01719f5b34baa2b714d3',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/log',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/log-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
            1 => '3.0.0',
          ),
        ),
        'psr/simple-cache' => 
        array (
          'pretty_version' => '3.0.0',
          'version' => '3.0.0.0',
          'reference' => '764e0b3939f5ca87cb904f570ef9be2d78a07865',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psr/simple-cache',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'psr/simple-cache-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '1.0|2.0|3.0',
          ),
        ),
        'psy/psysh' => 
        array (
          'pretty_version' => 'v0.12.18',
          'version' => '0.12.18.0',
          'reference' => 'ddff0ac01beddc251786fe70367cd8bbdb258196',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../psy/psysh',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ralouphie/getallheaders' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '120b605dfeb996808c31b6477290a714d356e822',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../ralouphie/getallheaders',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/collection' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => '344572933ad0181accbf4ba763e85a0306a8c5e2',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../ramsey/collection',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'ramsey/uuid' => 
        array (
          'pretty_version' => '4.9.2',
          'version' => '4.9.2.0',
          'reference' => '8429c78ca35a09f27565311b98101e2826affde0',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../ramsey/uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'revolt/event-loop' => 
        array (
          'pretty_version' => 'v1.0.8',
          'version' => '1.0.8.0',
          'reference' => 'b6fc06dce8e9b523c9946138fa5e62181934f91c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../revolt/event-loop',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'rhumsaa/uuid' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '4.9.2',
          ),
        ),
        'sebastian/cli-parser' => 
        array (
          'pretty_version' => '3.0.2',
          'version' => '3.0.2.0',
          'reference' => '15c5dd40dc4f38794d383bb95465193f5e0ae180',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/cli-parser',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit' => 
        array (
          'pretty_version' => '3.0.3',
          'version' => '3.0.3.0',
          'reference' => '54391c61e4af8078e5b276ab082b6d3c54c9ad64',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/code-unit',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/code-unit-reverse-lookup' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '183a9b2632194febd219bb9246eee421dad8d45e',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/code-unit-reverse-lookup',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/comparator' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '85c77556683e6eee4323e4c5468641ca0237e2e8',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/comparator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/complexity' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => 'ee41d384ab1906c68852636b6de493846e13e5a0',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/complexity',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/diff' => 
        array (
          'pretty_version' => '6.0.2',
          'version' => '6.0.2.0',
          'reference' => 'b4ccd857127db5d41a5b676f24b51371d76d8544',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/diff',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/environment' => 
        array (
          'pretty_version' => '7.2.1',
          'version' => '7.2.1.0',
          'reference' => 'a5c75038693ad2e8d4b6c15ba2403532647830c4',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/environment',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/exporter' => 
        array (
          'pretty_version' => '6.3.2',
          'version' => '6.3.2.0',
          'reference' => '70a298763b40b213ec087c51c739efcaa90bcd74',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/exporter',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/global-state' => 
        array (
          'pretty_version' => '7.0.2',
          'version' => '7.0.2.0',
          'reference' => '3be331570a721f9a4b5917f4209773de17f747d7',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/global-state',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/lines-of-code' => 
        array (
          'pretty_version' => '3.0.1',
          'version' => '3.0.1.0',
          'reference' => 'd36ad0d782e5756913e42ad87cb2890f4ffe467a',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/lines-of-code',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-enumerator' => 
        array (
          'pretty_version' => '6.0.1',
          'version' => '6.0.1.0',
          'reference' => 'f5b498e631a74204185071eb41f33f38d64608aa',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/object-enumerator',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/object-reflector' => 
        array (
          'pretty_version' => '4.0.1',
          'version' => '4.0.1.0',
          'reference' => '6e1a43b411b2ad34146dee7524cb13a068bb35f9',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/object-reflector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/recursion-context' => 
        array (
          'pretty_version' => '6.0.3',
          'version' => '6.0.3.0',
          'reference' => 'f6458abbf32a6c8174f8f26261475dc133b3d9dc',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/recursion-context',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/type' => 
        array (
          'pretty_version' => '5.1.3',
          'version' => '5.1.3.0',
          'reference' => 'f77d2d4e78738c98d9a68d2596fe5e8fa380f449',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/type',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'sebastian/version' => 
        array (
          'pretty_version' => '5.0.2',
          'version' => '5.0.2.0',
          'reference' => 'c687e3387b99f5b03b6caa64c74b63e2936ff874',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../sebastian/version',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/array-to-xml' => 
        array (
          'pretty_version' => '3.4.4',
          'version' => '3.4.4.0',
          'reference' => '88b2f3852a922dd73177a68938f8eb2ec70c7224',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../spatie/array-to-xml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'spatie/once' => 
        array (
          'dev_requirement' => false,
          'replaced' => 
          array (
            0 => '*',
          ),
        ),
        'staabm/side-effects-detector' => 
        array (
          'pretty_version' => '1.0.5',
          'version' => '1.0.5.0',
          'reference' => 'd8334211a140ce329c13726d4a715adbddd0a163',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../staabm/side-effects-detector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/clock' => 
        array (
          'pretty_version' => 'v8.0.0',
          'version' => '8.0.0.0',
          'reference' => '832119f9b8dbc6c8e6f65f30c5969eca1e88764f',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/clock',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/console' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => '732a9ca6cd9dfd940c639062d5edbde2f6727fb6',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/console',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/css-selector' => 
        array (
          'pretty_version' => 'v8.0.0',
          'version' => '8.0.0.0',
          'reference' => '6225bd458c53ecdee056214cb4a2ffaf58bd592b',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/css-selector',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/deprecation-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '63afe740e99a13ba87ec199bb07bbdee937a5b62',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/deprecation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/error-handler' => 
        array (
          'pretty_version' => 'v7.4.0',
          'version' => '7.4.0.0',
          'reference' => '48be2b0653594eea32dcef130cca1c811dcf25c2',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/error-handler',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher' => 
        array (
          'pretty_version' => 'v8.0.0',
          'version' => '8.0.0.0',
          'reference' => '573f95783a2ec6e38752979db139f09fec033f03',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/event-dispatcher',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-contracts' => 
        array (
          'pretty_version' => 'v3.6.0',
          'version' => '3.6.0.0',
          'reference' => '59eb412e93815df44f05f342958efa9f46b1e586',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/event-dispatcher-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/event-dispatcher-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.0|3.0',
          ),
        ),
        'symfony/filesystem' => 
        array (
          'pretty_version' => 'v8.0.1',
          'version' => '8.0.1.0',
          'reference' => 'd937d400b980523dc9ee946bb69972b5e619058d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/filesystem',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'symfony/finder' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => 'fffe05569336549b20a1be64250b40516d6e8d06',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/finder',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-foundation' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => 'a70c745d4cea48dbd609f4075e5f5cbce453bd52',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/http-foundation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/http-kernel' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => '885211d4bed3f857b8c964011923528a55702aa5',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/http-kernel',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mailer' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => 'e472d35e230108231ccb7f51eb6b2100cac02ee4',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/mailer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/mime' => 
        array (
          'pretty_version' => 'v7.4.0',
          'version' => '7.4.0.0',
          'reference' => 'bdb02729471be5d047a3ac4a69068748f1a6be7a',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/mime',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-ctype' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => 'a3cc8b044a6ea513310cbd48ef7333b384945638',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-ctype',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-grapheme' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '380872130d3a5dd3ace2f4010d95125fde5d5c70',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-intl-grapheme',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-idn' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '9614ac4d8061dc257ecc64cba1b140873dce8ad3',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-intl-idn',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-intl-normalizer' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '3833d7255cc303546435cb650316bff708a1c75c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-intl-normalizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-mbstring' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '6d857f4d76bd4b343eac26d6b539585d2bc56493',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-mbstring',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php80' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '0cc9dd0f17f61d8131e7df6b84bd344899fe2608',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-php80',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php83' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '17f6f9a6b1735c0f163024d959f700cfbc5155e5',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-php83',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php84' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => 'd8ced4d875142b6a7426000426b8abc631d6b191',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-php84',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-php85' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => 'd4e5fcd4ab3d998ab16c0db48e6cbb9a01993f91',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-php85',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/polyfill-uuid' => 
        array (
          'pretty_version' => 'v1.33.0',
          'version' => '1.33.0.0',
          'reference' => '21533be36c24be3f4b1669c4725c7d1d2bab4ae2',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/polyfill-uuid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/process' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => '2f8e1a6cdf590ca63715da4d3a7a3327404a523f',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/process',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/routing' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => '5d3fd7adf8896c2fdb54e2f0f35b1bcbd9e45090',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/routing',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/service-contracts' => 
        array (
          'pretty_version' => 'v3.6.1',
          'version' => '3.6.1.0',
          'reference' => '45112560a3ba2d715666a509a0bc9521d10b6c43',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/service-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/string' => 
        array (
          'pretty_version' => 'v8.0.1',
          'version' => '8.0.1.0',
          'reference' => 'ba65a969ac918ce0cc3edfac6cdde847eba231dc',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/string',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation' => 
        array (
          'pretty_version' => 'v8.0.3',
          'version' => '8.0.3.0',
          'reference' => '60a8f11f0e15c48f2cc47c4da53873bb5b62135d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/translation',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-contracts' => 
        array (
          'pretty_version' => 'v3.6.1',
          'version' => '3.6.1.0',
          'reference' => '65a8bc82080447fae78373aa10f8d13b38338977',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/translation-contracts',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/translation-implementation' => 
        array (
          'dev_requirement' => false,
          'provided' => 
          array (
            0 => '2.3|3.0',
          ),
        ),
        'symfony/uid' => 
        array (
          'pretty_version' => 'v7.4.0',
          'version' => '7.4.0.0',
          'reference' => '2498e9f81b7baa206f44de583f2f48350b90142c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/uid',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/var-dumper' => 
        array (
          'pretty_version' => 'v7.4.3',
          'version' => '7.4.3.0',
          'reference' => '7e99bebcb3f90d8721890f2963463280848cba92',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/var-dumper',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'symfony/yaml' => 
        array (
          'pretty_version' => 'v7.4.1',
          'version' => '7.4.1.0',
          'reference' => '24dd4de28d2e3988b311751ac49e684d783e2345',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../symfony/yaml',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'theseer/tokenizer' => 
        array (
          'pretty_version' => '1.3.1',
          'version' => '1.3.1.0',
          'reference' => 'b7489ce515e168639d17feec34b8847c326b0b3c',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../theseer/tokenizer',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'tijsverkoyen/css-to-inline-styles' => 
        array (
          'pretty_version' => 'v2.4.0',
          'version' => '2.4.0.0',
          'reference' => 'f0292ccf0ec75843d65027214426b6b163b48b41',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../tijsverkoyen/css-to-inline-styles',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'vimeo/psalm' => 
        array (
          'pretty_version' => '6.14.3',
          'version' => '6.14.3.0',
          'reference' => 'd0b040a91f280f071c1abcb1b77ce3822058725a',
          'type' => 'project',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../vimeo/psalm',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
        'vlucas/phpdotenv' => 
        array (
          'pretty_version' => 'v5.6.3',
          'version' => '5.6.3.0',
          'reference' => '955e7815d677a3eaa7075231212f2110983adecc',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../vlucas/phpdotenv',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'voku/portable-ascii' => 
        array (
          'pretty_version' => '2.0.3',
          'version' => '2.0.3.0',
          'reference' => 'b1d923f88091c6bf09699efcd7c8a1b1bfd7351d',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../voku/portable-ascii',
          'aliases' => 
          array (
          ),
          'dev_requirement' => false,
        ),
        'webmozart/assert' => 
        array (
          'pretty_version' => '2.1.1',
          'version' => '2.1.1.0',
          'reference' => 'bdbabc199a7ba9965484e4725d66170e5711323b',
          'type' => 'library',
          'install_path' => 'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\composer/../webmozart/assert',
          'aliases' => 
          array (
          ),
          'dev_requirement' => true,
        ),
      ),
    ),
  ),
  'executedFilesHashes' => 
  array (
    'C:\\Project\\mts-nurul-falaah-soreang\\vendor\\larastan\\larastan\\bootstrap.php' => '28392079817075879815f110287690e80398fe5e',
    'phar://C:\\Project\\mts-nurul-falaah-soreang\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\Attribute85.php' => '123dcd45f03f2463904087a66bfe2bc139760df0',
    'phar://C:\\Project\\mts-nurul-falaah-soreang\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionAttribute.php' => '0b4b78277eb6545955d2ce5e09bff28f1f8052c8',
    'phar://C:\\Project\\mts-nurul-falaah-soreang\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionIntersectionType.php' => 'a3e6299b87ee5d407dae7651758edfa11a74cb11',
    'phar://C:\\Project\\mts-nurul-falaah-soreang\\vendor\\phpstan\\phpstan\\phpstan.phar\\stubs\\runtime\\ReflectionUnionType.php' => '1b349aa997a834faeafe05fa21bc31cae22bf2e2',
  ),
  'phpExtensions' => 
  array (
    0 => 'Core',
    1 => 'PDO',
    2 => 'Phar',
    3 => 'Reflection',
    4 => 'SPL',
    5 => 'SimpleXML',
    6 => 'Zend OPcache',
    7 => 'bcmath',
    8 => 'calendar',
    9 => 'ctype',
    10 => 'date',
    11 => 'dom',
    12 => 'fileinfo',
    13 => 'filter',
    14 => 'hash',
    15 => 'iconv',
    16 => 'json',
    17 => 'lexbor',
    18 => 'libxml',
    19 => 'mbstring',
    20 => 'mysqlnd',
    21 => 'openssl',
    22 => 'pcre',
    23 => 'pdo_pgsql',
    24 => 'pgsql',
    25 => 'random',
    26 => 'readline',
    27 => 'session',
    28 => 'standard',
    29 => 'tokenizer',
    30 => 'uri',
    31 => 'xml',
    32 => 'xmlreader',
    33 => 'xmlwriter',
    34 => 'zlib',
  ),
  'stubFiles' => 
  array (
  ),
  'level' => '6',
),
	'projectExtensionFiles' => array (
),
	'errorsCallback' => static function (): array { return array (
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::uploadImage() has parameter $allowedMimes with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 20,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 20,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::uploadImages() has parameter $allowedMimes with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 71,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 71,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::uploadImages() has parameter $files with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 71,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 71,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::uploadImages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 71,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 71,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::deleteImages() has parameter $paths with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 123,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 123,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::validateImage() has parameter $allowedMimes with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 143,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 143,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Core\\Services\\FileUploadService::validateImage() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'line' => 143,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 143,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::processMessage() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 26,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::matchBuiltInIntents() has parameter $keywords with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 75,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::matchBuiltInIntents() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 75,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Using nullsafe property access "?->contact_wa" on left side of ?? is unnecessary. Use -> instead.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 242,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 242,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullsafe.neverNull',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Using nullsafe property access "?->kontak_person" on left side of ?? is unnecessary. Use -> instead.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 242,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 242,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullsafe.neverNull',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::matchRuleBasedIntents() has parameter $userKeywords with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 259,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 259,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::matchRuleBasedIntents() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 259,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 259,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::calculateKeywordMatchScore() has parameter $intentKeywords with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 295,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 295,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::calculateKeywordMatchScore() has parameter $userKeywords with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 295,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 295,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::searchSimilarFaqs() has parameter $keywords with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 335,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 335,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::searchSimilarFaqs() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 335,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 335,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::formatResponse() has parameter $match with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 372,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 372,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::formatResponse() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 372,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 372,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::getFallbackResponse() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 390,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 390,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $botResponse with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $ip with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $matchedIntent with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $sessionId with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $startTime with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $ua with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    20 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\ChatbotService::logConversation() has parameter $userMessage with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'line' => 405,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 405,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Property App\\Domain\\Chatbot\\Services\\TextProcessingService::$stopWords type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'line' => 7,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 7,
       'nodeType' => 'PHPStan\\Node\\ClassPropertyNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\TextProcessingService::extractKeywords() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\TextProcessingService::jaccardSimilarity() has parameter $arr1 with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 49,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Chatbot\\Services\\TextProcessingService::jaccardSimilarity() has parameter $arr2 with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 49,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getHomeData() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getSchoolProfile() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getBanners() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getHighlightNews() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getLatestNews() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 73,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 73,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getLatestArticles() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 85,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 85,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getFotoKegiatan() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 97,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 97,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getPrestasiSiswa() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 108,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 108,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getInfoTerkini() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 119,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 119,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getAgendaTerbaru() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 131,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 131,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Using nullsafe property access "?->timestamp" on left side of ?? is unnecessary. Use -> instead.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 146,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 146,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullsafe.neverNull',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getTickerItems() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 151,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 151,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\HomeDataService::getVideoKegiatan() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'line' => 182,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 182,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::createPost() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 27,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 27,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::updatePost() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 42,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::prepareData() has parameter $validatedData with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 76,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 76,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::prepareData() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 76,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 76,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handleSlugLogic() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 99,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 99,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handleThumbnailLogic() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 122,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 122,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handleContentImagesLogic() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 146,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 146,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Using nullsafe property access "?->image_metadata" on left side of ?? is unnecessary. Use -> instead.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 150,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 150,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullsafe.neverNull',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function is_array() with array will always evaluate to true.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 153,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'Because the type is coming from a PHPDoc, you can turn off this check by setting <fg=cyan>treatPhpDocTypesAsCertain: false</> in your <fg=cyan>%configurationFile%</>.',
       'nodeLine' => 153,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handleScheduledTimeLogic() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 240,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 240,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Offset 0 on non-empty-list<string> on left side of ?? always exists and is not nullable.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 252,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 252,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullCoalesce.offset',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handleTagsLogic() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 275,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 275,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handleBodyAndMetaLogic() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 304,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 304,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Content\\Services\\PostService::handlePublicationTimeLogics() has parameter $data with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'line' => 351,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 351,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Media\\Services\\YouTubeService::getVideoDetails() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 10,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Media\\Services\\YouTubeService::formatViews() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Domain\\Media\\Services\\YouTubeService::formatViews() has parameter $views with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostStatus.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Enums\\PostStatus::values() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostStatus.php',
       'line' => 20,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostStatus.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 20,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostType.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Enums\\PostType::values() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostType.php',
       'line' => 18,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostType.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 18,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $view of function view expects view-string|null, string given.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $view of function view expects view-string|null, string given.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
       'line' => 93,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 93,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ActivityVideoController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ActivityVideoController::create() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ActivityVideoController::store() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ActivityVideoController::edit() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ActivityVideoController::update() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ActivityVideoController::destroy() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'line' => 84,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 84,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::adminLogin() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::adminAuthenticate() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 18,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 18,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::logout() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::showChangeUsername() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::changeUsername() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 51,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 51,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::showChangePassword() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 75,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\AuthController::changePassword() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'line' => 80,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 80,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::show() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 87,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 87,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property Illuminate\\Database\\Eloquent\\Model::$title.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 104,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 104,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property Illuminate\\Database\\Eloquent\\Model::$type.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 105,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 105,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property Illuminate\\Database\\Eloquent\\Model::$slug.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 106,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 106,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property Illuminate\\Database\\Eloquent\\Model::$type.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 106,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 106,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::reply() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 153,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 153,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::approve() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 189,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 189,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::reject() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 206,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 206,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::markAsRead() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 218,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 218,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::markAsUnread() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 232,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 232,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::markAllAsRead() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 246,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 246,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::bulkApprove() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 255,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 255,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\CommentController::destroy() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'line' => 276,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 276,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\DashboardController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
       'line' => 17,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 17,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\HelpController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php',
       'line' => 9,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 9,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ImageUploadController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\ImageUploadController::store() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ImageUploadController.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ImageUploadController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\InboxController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'line' => 11,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 11,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\InboxController::show() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'line' => 60,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 60,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\InboxController::destroy() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'line' => 70,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 70,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\InboxController::markAsRead() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'line' => 80,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 80,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\InboxController::markAsUnread() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'line' => 90,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 90,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\PublicationController::redirectBerita() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
       'line' => 113,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 113,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\PublicationController::redirectArtikel() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
       'line' => 121,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 121,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\SiteInformationController::update() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php',
       'line' => 75,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 75,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\SpmbSettingController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
       'line' => 16,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 16,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\SpmbSettingController::update() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
       'line' => 37,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property App\\Models\\SpmbSetting::$description.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
       'line' => 98,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 98,
       'nodeType' => 'PHPStan\\Node\\PropertyAssignNode',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\StudentAchievementController::parseSize() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'line' => 135,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 135,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\StudentAchievementController::parseSize() has parameter $size with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'line' => 135,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 135,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Parameter #1 $num of function round expects float|int, (array<string>|string|null) given.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'line' => 142,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 142,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'argument.type',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\StudentAchievementController::formatBytes() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'line' => 145,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 145,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\StudentAchievementController::formatBytes() has parameter $bytes with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'line' => 145,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 145,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\StudentAchievementController::formatBytes() has parameter $precision with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'line' => 145,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 145,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Admin\\VisualIdentityController::updateBannerOrder() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php',
       'line' => 235,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 235,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Called \'env\' outside of the config directory which returns null when the config is cached, use \'config\'.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
       'line' => 47,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 47,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'larastan.noEnvCallsOutsideOfConfig',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Called \'env\' outside of the config directory which returns null when the config is cached, use \'config\'.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'larastan.noEnvCallsOutsideOfConfig',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Called \'env\' outside of the config directory which returns null when the config is cached, use \'config\'.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
       'line' => 51,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 51,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'larastan.noEnvCallsOutsideOfConfig',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Called \'pluck\' on Laravel collection, but could have been retrieved as a query.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
       'line' => 55,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 55,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'larastan.noUnnecessaryCollectionCall',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to static method first() on an unknown class App\\Http\\Controllers\\Web\\SchoolProfile.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
       'line' => 207,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more at https://phpstan.org/user-guide/discovering-symbols',
       'nodeLine' => 207,
       'nodeType' => 'PhpParser\\Node\\Expr\\StaticCall',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\CommentController::store() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\CommentLikeController::toggle() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ContactController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ContactController::store() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
       'line' => 57,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\GalleryController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'line' => 12,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\GalleryController::fotoKegiatan() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'line' => 17,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 17,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\GalleryController::videoKegiatan() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'line' => 23,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 23,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\GalleryController::dokumentasi() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\GalleryController::prestasiSiswa() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'line' => 34,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 34,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\GalleryController::showPrestasiSiswa() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'line' => 41,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 41,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::berita() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 17,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 17,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::artikel() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 51,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 51,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::byTag() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 85,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 85,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::pengumuman() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 127,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 127,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::showAnnouncement() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 165,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 165,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property App\\Models\\Announcement::$is_active.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 167,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 167,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::agenda() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 191,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 191,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::showAgenda() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 230,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 230,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Access to an undefined property App\\Models\\Schedule::$is_active.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 232,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => 'Learn more: <fg=cyan>https://phpstan.org/blog/solving-phpstan-access-to-undefined-property</>',
       'nodeLine' => 232,
       'nodeType' => 'PhpParser\\Node\\Expr\\PropertyFetch',
       'identifier' => 'property.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::show() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 257,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 257,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\InformationController::globalSearch() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'line' => 369,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 369,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::getSidebarData() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 15,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 15,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::informasiSekolah() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 49,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 49,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::visiMisi() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::sejarah() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::strukturOrganisasi() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 64,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 64,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::kepalaSekolahGuru() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 69,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 69,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\ProfileController::prestasi() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'line' => 74,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 74,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\SpmbController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php',
       'line' => 12,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 12,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\UnderConstructionController::index() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php',
       'line' => 9,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 9,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Controllers\\Web\\UnderConstructionController::socialMediaUnavailable() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\PostRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
       'line' => 15,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 15,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\PostRequest::withValidator() has parameter $validator with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
       'line' => 56,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 56,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Using nullsafe property access "?->type" on left side of ?? is unnecessary. Use -> instead.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
       'line' => 59,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 59,
       'nodeType' => 'PhpParser\\Node\\Expr\\BinaryOp\\Coalesce',
       'identifier' => 'nullsafe.neverNull',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php',
       'line' => 26,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 26,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreAnnouncementRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreAnnouncementRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreScheduleRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreScheduleRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateScheduleRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateScheduleRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest::rules() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php',
       'line' => 14,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 14,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest::messages() return type has no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php',
       'traitFilePath' => NULL,
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityPhoto::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityPhoto::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityPhoto::scopeOrdered() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityPhoto::scopeOrdered() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\ActivityVideo uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityVideo::getEmbedUrlAttribute() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityVideo::getThumbnailUrlAttribute() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ActivityVideo::getYoutubeIdAttribute() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'line' => 39,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 39,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 28,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 28,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 28,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 28,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeOrdered() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 33,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 33,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeOrdered() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 33,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 33,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeSearch() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeSearch() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeStatusFilter() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeStatusFilter() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeStatusFilter() has parameter $status with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'line' => 48,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 48,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeApplyFilters() has parameter $query with generic class Illuminate\\Database\\Eloquent\\Builder but does not specify its types: TModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeApplyFilters() has parameter $sortMapping with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::scopeApplyFilters() return type with generic class Illuminate\\Database\\Eloquent\\Builder does not specify its types: TModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Eloquent\\Builder::search().',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to function method_exists() with $this(App\\Models\\Announcement) and \'scopeStatusFilter\' will always evaluate to true.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PhpParser\\Node\\Expr\\FuncCall',
       'identifier' => 'function.alreadyNarrowedType',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Eloquent\\Builder::statusFilter().',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::applySorting() has parameter $query with generic class Illuminate\\Database\\Eloquent\\Builder but does not specify its types: TModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Announcement::applySorting() has parameter $sortMapping with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Announcement)',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 44,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Banner::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Banner::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Banner::scopeOrdered() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Banner::scopeOrdered() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'line' => 40,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 40,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeSession() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeSession() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeRecent() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeRecent() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeLowConfidence() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeLowConfidence() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 46,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 46,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeMethod() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotConversation::scopeMethod() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'line' => 54,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 54,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotFaq::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'line' => 27,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 27,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotFaq::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'line' => 27,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 27,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotFaq::scopeCategory() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotFaq::scopeCategory() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'line' => 35,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 35,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotFaq::scopePopular() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'line' => 43,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 43,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotFaq::scopePopular() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'line' => 43,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 43,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotIntent::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotIntent::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'line' => 29,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 29,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotIntent::scopeByPriority() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'line' => 37,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotIntent::scopeByPriority() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'line' => 37,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotIntent::scopeCategory() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'line' => 45,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 45,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\ChatbotIntent::scopeCategory() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'line' => 45,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 45,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::post() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 32,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 32,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::parent() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 37,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 37,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::children() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\HasMany does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 42,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 42,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::likes() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\HasMany does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 47,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 47,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::scopeApproved() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 52,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 52,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::scopeApproved() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 52,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 52,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::scopeUnread() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 57,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::scopeUnread() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 57,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 57,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::scopeNewest() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 62,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 62,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Comment::scopeNewest() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'line' => 62,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 62,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\CommentLike::comment() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php',
       'line' => 17,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 17,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\CommentLike::user() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php',
       'line' => 22,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 22,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Contact::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Contact::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'line' => 25,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 25,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Contact::scopeOrdered() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Contact::scopeOrdered() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'line' => 30,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 30,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\InboxMessage uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\InboxMessage::scopeUnread() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\InboxMessage::scopeUnread() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\Post uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 18,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 18,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopePublished() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 98,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 98,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopePublished() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 98,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 98,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeOfType() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 105,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 105,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    4 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeOfType() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 105,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 105,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    5 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeSearch() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 110,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 110,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    6 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeSearch() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 110,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 110,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    7 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeByTag() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 122,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 122,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    8 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeByTag() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 122,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 122,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    9 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::author() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 127,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 127,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    10 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::comments() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 132,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 132,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    11 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::approvedComments() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 137,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 137,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    12 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::views() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'line' => 142,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 142,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    13 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeApplyFilters() has parameter $query with generic class Illuminate\\Database\\Eloquent\\Builder but does not specify its types: TModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    14 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeApplyFilters() has parameter $sortMapping with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    15 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::scopeApplyFilters() return type with generic class Illuminate\\Database\\Eloquent\\Builder does not specify its types: TModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 19,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 19,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    16 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Eloquent\\Builder::search().',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 24,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 24,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    17 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Call to an undefined method Illuminate\\Database\\Eloquent\\Builder::statusFilter().',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PhpParser\\Node\\Expr\\MethodCall',
       'identifier' => 'method.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    18 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::applySorting() has parameter $query with generic class Illuminate\\Database\\Eloquent\\Builder but does not specify its types: TModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => NULL,
       'nodeLine' => 44,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    19 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Post::applySorting() has parameter $sortMapping with no value type specified in iterable type array.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php (in context of class App\\Models\\Post)',
       'line' => 44,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
       'traitFilePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php',
       'tip' => 'See: https://phpstan.org/blog/solving-phpstan-no-value-type-specified-in-iterable-type',
       'nodeLine' => 44,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.iterableValue',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\PostView::post() return type with generic class Illuminate\\Database\\Eloquent\\Relations\\BelongsTo does not specify its types: TRelatedModel, TDeclaringModel',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php',
       'line' => 21,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 21,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Schedule::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'line' => 33,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 33,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Schedule::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'line' => 33,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 33,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Schedule::scopeOrdered() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\Schedule::scopeOrdered() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'line' => 38,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 38,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbFaq.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\SpmbFaq uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbFaq.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbFaq.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbRequirement.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\SpmbRequirement uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbRequirement.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbRequirement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbSetting.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\SpmbSetting uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbSetting.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbSetting.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbTimeline.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Class App\\Models\\SpmbTimeline uses generic trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory but does not specify its types: TFactory',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbTimeline.php',
       'line' => 10,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbTimeline.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 10,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'missingType.generics',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\StudentAchievement::scopeActive() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\StudentAchievement::scopeActive() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'line' => 31,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 31,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    2 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\StudentAchievement::scopeOrdered() has no return type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.return',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    3 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Method App\\Models\\StudentAchievement::scopeOrdered() has parameter $query with no type specified.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'line' => 36,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 36,
       'nodeType' => 'PHPStan\\Node\\InClassMethodNode',
       'identifier' => 'missingType.parameter',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'PHPDoc tag @use has invalid type Database\\Factories\\UserFactory.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'class.notFound',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
    1 => 
    \PHPStan\Analyser\Error::__set_state(array(
       'message' => 'Type Database\\Factories\\UserFactory in generic type Illuminate\\Database\\Eloquent\\Factories\\HasFactory<Database\\Factories\\UserFactory> in PHPDoc tag @use is not subtype of template type TFactory of Illuminate\\Database\\Eloquent\\Factories\\Factory of trait Illuminate\\Database\\Eloquent\\Factories\\HasFactory.',
       'file' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php',
       'line' => 13,
       'canBeIgnored' => true,
       'filePath' => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php',
       'traitFilePath' => NULL,
       'tip' => NULL,
       'nodeLine' => 13,
       'nodeType' => 'PhpParser\\Node\\Stmt\\TraitUse',
       'identifier' => 'generics.notSubtype',
       'metadata' => 
      array (
      ),
       'fixedErrorDiff' => NULL,
    )),
  ),
); },
	'locallyIgnoredErrorsCallback' => static function (): array { return array (
); },
	'linesToIgnore' => array (
),
	'unmatchedLineIgnores' => array (
),
	'collectedDataCallback' => static function (): array { return array (
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\NotificationService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Core\\Services\\NotificationService',
        1 => 'customSuccess',
        2 => 'App\\Core\\Services\\NotificationService',
      ),
      1 => 
      array (
        0 => 'App\\Core\\Services\\NotificationService',
        1 => 'customError',
        2 => 'App\\Core\\Services\\NotificationService',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Domain\\Chatbot\\Services\\ChatbotService',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 408,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Cache',
        1 => 'forget',
        2 => 423,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Cache',
        1 => 'forget',
        2 => 424,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Cache',
        1 => 'forget',
        2 => 425,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Cache',
        1 => 'forget',
        2 => 426,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Cache',
        1 => 'forget',
        2 => 224,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Domain\\Content\\Services\\PostService',
    ),
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Domain\\Content\\Services\\PostService',
        1 => 'isFeaturedBerita',
        2 => 'App\\Domain\\Content\\Services\\PostService',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostStatus.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Enums\\PostStatus',
        1 => 'label',
        2 => 'App\\Enums\\PostStatus',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostType.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Enums\\PostType',
        1 => 'label',
        2 => 'App\\Enums\\PostType',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.media.photo.index',
      1 => 'admin.pages.media.photo.create',
      2 => 'admin.pages.media.photo.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Admin\\ActivityPhotoController',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 56,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.media.video.index',
      1 => 'admin.pages.media.video.create',
      2 => 'admin.pages.media.video.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Admin\\ActivityVideoController',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureMethodCallCollector' => 
    array (
      0 => 
      array (
        0 => 
        array (
          0 => 'Illuminate\\Database\\Eloquent\\Model',
        ),
        1 => 'save',
        2 => 47,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.announcement.index',
      1 => 'admin.pages.announcement.create',
      2 => 'admin.pages.announcement.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 67,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.auth.login',
      1 => 'admin.pages.settings.account.change-username',
      2 => 'admin.pages.settings.account.change-password',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.comments.index',
      1 => 'admin.pages.comments.show',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 173,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.dashboard.index',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.help.index',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.inbox.index',
      1 => 'admin.pages.inbox.show',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.posts.index',
      1 => 'admin.pages.posts.create',
      2 => 'admin.pages.posts.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Admin\\PostController',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'session',
        1 => 39,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.publication.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'session',
        1 => 44,
      ),
      1 => 
      array (
        0 => 'session',
        1 => 46,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.agenda.index',
      1 => 'admin.pages.agenda.create',
      2 => 'admin.pages.agenda.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 76,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.profile.index',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Admin\\SchoolProfileController',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.settings.site-information.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 129,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 138,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 141,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 142,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 145,
      ),
      5 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 148,
      ),
      6 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 152,
      ),
      7 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 153,
      ),
      8 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 156,
      ),
      9 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 157,
      ),
      10 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 160,
      ),
      11 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 161,
      ),
      12 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 164,
      ),
      13 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 165,
      ),
      14 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 168,
      ),
      15 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'updateOrCreate',
        2 => 169,
      ),
      16 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 197,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.settings.spmb.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'truncate',
        2 => 103,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 107,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'truncate',
        2 => 119,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 123,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'truncate',
        2 => 133,
      ),
      5 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 137,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.achievement.index',
      1 => 'admin.pages.achievement.create',
      2 => 'admin.pages.achievement.edit',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Admin\\StudentAchievementController',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 128,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'admin.pages.settings.visual-identity.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 139,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Api\\ChatbotController',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 71,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 32,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.contact.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 66,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.gallery.index',
      1 => 'web.pages.gallery.photo.index',
      2 => 'web.pages.gallery.video.index',
      3 => 'web.pages.gallery.dokumentasi',
      4 => 'web.pages.profile.prestasi',
      5 => 'web.pages.gallery.achievement.show',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'abort',
        1 => 44,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\HomeController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.home.index',
    ),
    'PHPStan\\Rules\\DeadCode\\ConstructorWithoutImpurePointsCollector' => 
    array (
      0 => 'App\\Http\\Controllers\\Web\\HomeController',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.information.news.index',
      1 => 'web.pages.information.article.index',
      2 => 'web.pages.information.tag',
      3 => 'web.pages.information.announcement.index',
      4 => 'web.pages.information.announcement.show',
      5 => 'web.pages.information.agenda.index',
      6 => 'web.pages.information.agenda.show',
      7 => 'web.pages.information.detail',
      8 => 'web.pages.search.index',
    ),
    'PHPStan\\Rules\\DeadCode\\PossiblyPureFuncCallCollector' => 
    array (
      0 => 
      array (
        0 => 'abort',
        1 => 168,
      ),
      1 => 
      array (
        0 => 'abort',
        1 => 233,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.profile.about-school',
      1 => 'web.pages.profile.school-info',
      2 => 'web.pages.profile.vision-mission',
      3 => 'web.pages.profile.sejarah',
      4 => 'web.pages.profile.organizational-structure',
      5 => 'web.pages.profile.principal-teacher',
      6 => 'web.pages.profile.prestasi',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.spmb.index',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php' => 
  array (
    'Larastan\\Larastan\\Collectors\\UsedViewFunctionCollector' => 
    array (
      0 => 'web.pages.errors.under-construction',
      1 => 'web.pages.errors.social-media-unavailable',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
        1 => 'authorize',
        2 => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
      ),
      1 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
        1 => 'rules',
        2 => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
      ),
      2 => 
      array (
        0 => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
        1 => 'messages',
        2 => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\ActivityVideo',
        1 => 'getEmbedUrlAttribute',
        2 => 'App\\Models\\ActivityVideo',
      ),
      1 => 
      array (
        0 => 'App\\Models\\ActivityVideo',
        1 => 'getThumbnailUrlAttribute',
        2 => 'App\\Models\\ActivityVideo',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Traits\\Filterable',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'App\\Traits\\Filterable',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbFaq.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbRequirement.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbSetting.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbTimeline.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\MethodWithoutImpurePointsCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Models\\User',
        1 => 'casts',
        2 => 'App\\Models\\User',
      ),
    ),
    'PHPStan\\Rules\\Traits\\TraitUseCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Notifications\\Notifiable',
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\View',
        1 => 'composer',
        2 => 31,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php' => 
  array (
    'PHPStan\\Rules\\Traits\\TraitDeclarationCollector' => 
    array (
      0 => 
      array (
        0 => 'App\\Traits\\Filterable',
        1 => 8,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\AdminUserSeeder.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Builder',
        1 => 'create',
        2 => 16,
      ),
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php' => 
  array (
    'PHPStan\\Rules\\DeadCode\\PossiblyPureStaticCallCollector' => 
    array (
      0 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'resource',
        2 => 67,
      ),
      1 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'resource',
        2 => 68,
      ),
      2 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'resource',
        2 => 72,
      ),
      3 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'resource',
        2 => 73,
      ),
      4 => 
      array (
        0 => 'Illuminate\\Support\\Facades\\Route',
        1 => 'resource',
        2 => 74,
      ),
    ),
  ),
); },
	'dependencies' => array (
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php' => 
  array (
    'fileHash' => '0ce15368ff38dc9ac89a2fd716336129c4b5e5aa',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\NotificationService.php' => 
  array (
    'fileHash' => '17d89cee92ee391915e5e5f06f5973c28c763f0c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php' => 
  array (
    'fileHash' => '0003a352fddf54e4152726ff13a92f98e26eafb3',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php' => 
  array (
    'fileHash' => '7b024ce8d0bd879d4ba6085f535c9b1e54ee91bc',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php' => 
  array (
    'fileHash' => '50fb893cb4e5515869aee3c8c3c849a69b3460f8',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\HomeController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
      7 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php',
      8 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
      9 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php',
      10 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php' => 
  array (
    'fileHash' => 'cdc2cdfa7d5b7b0034a9c5663ea7fbf4ad463461',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php' => 
  array (
    'fileHash' => 'deb5431b22df9d56628a3686b2861d748674c8e4',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostStatus.php' => 
  array (
    'fileHash' => 'd5f9e820917f69160f97e37f9831611910727b3e',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostType.php' => 
  array (
    'fileHash' => '8c95767e6537e1288bee9288bafd6c8348d2b263',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php' => 
  array (
    'fileHash' => 'ede37f3aea2d81662f048508fa69cc83b4aec579',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php' => 
  array (
    'fileHash' => '77e1f8a16fa61d1495ad3e7016a537a4173a5636',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php' => 
  array (
    'fileHash' => 'd18e09c1d3bad7a9287495f751a0e4cb9ca8dba6',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php' => 
  array (
    'fileHash' => '8cafdfc67af4564348c5898b12fbe47e11c9bf8e',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php' => 
  array (
    'fileHash' => 'd112ac85e6491c472f91042cb24458101d531231',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php' => 
  array (
    'fileHash' => '044ceb02f40b6b98a7adcd745323127d14003d08',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php' => 
  array (
    'fileHash' => '12387e7f62b2e558ab825137608deeaae9bcaea8',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ImageUploadController.php' => 
  array (
    'fileHash' => 'af7ab2423d7d6eab8724957b1f349829e1afe615',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php' => 
  array (
    'fileHash' => '2aefa65d6c9035b2c37778e675e3504a1a10fc6a',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php' => 
  array (
    'fileHash' => 'de1c21b908b20af81cf08609a5ebe39438b58d9b',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php' => 
  array (
    'fileHash' => '8dedc1eab562ba38832b6b1c475794813be84c7c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php' => 
  array (
    'fileHash' => '916f944e2ac8d05df6bdce2b6a953543afca00aa',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php' => 
  array (
    'fileHash' => '28ad28620d34587e3960aa234ce59d5f0f90951a',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php' => 
  array (
    'fileHash' => '02926e56fc74bb5c8ccbd82306017aa8b7995956',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php' => 
  array (
    'fileHash' => '65feba4d90458dc80184f805d75ba91a6091e5be',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php' => 
  array (
    'fileHash' => '97941becd5ce57d97e7b69618aa2ff6d12964568',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php' => 
  array (
    'fileHash' => 'ef14d976cecab9cbfac24c0ddacc65cb06d7437a',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php' => 
  array (
    'fileHash' => 'e8cdcec3115d4ee7af2d3af7eb4dde1ac3becf61',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\api.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Controller.php' => 
  array (
    'fileHash' => 'a33a5105f92c73a309c9f8a549905dcdf6dccbae',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php',
      7 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ImageUploadController.php',
      8 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
      9 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
      10 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
      11 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php',
      12 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php',
      13 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php',
      14 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
      15 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
      16 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php',
      17 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php',
      18 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      19 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php',
      20 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php',
      21 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
      22 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
      23 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\HomeController.php',
      24 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      25 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
      26 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php',
      27 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php',
      28 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php',
      29 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\api.php',
      30 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php' => 
  array (
    'fileHash' => '99ec35b55ff559de6c81c1781b43ac422f47b850',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\api.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php' => 
  array (
    'fileHash' => '2ee0e3ee0b71a213eb0f73d6313e543d0ffb8f92',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php' => 
  array (
    'fileHash' => '4032dbdef397aa3160457193073bb6ce4e8ed2c7',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php' => 
  array (
    'fileHash' => 'bf8235cb13d4b2eae54c29b4bc442bf40cd8280d',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php' => 
  array (
    'fileHash' => '8c91b79aac85e3481cf78137c5a8289a412dcfed',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\HomeController.php' => 
  array (
    'fileHash' => '9d8145ce0e903a4c7ba77c70fff5a62b86fa8b9c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php' => 
  array (
    'fileHash' => 'e5a1dfe2dbf98c48c6ab164af3cac5a092cdffa8',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php' => 
  array (
    'fileHash' => 'a57786bbcaffba9b3c455d27a27d2b2c82cd7f2f',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php' => 
  array (
    'fileHash' => '579ea5422746731dedd37fb161a7ada1502130ba',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php' => 
  array (
    'fileHash' => '9cdd9e998bf11283982a0c97030d086cb138256d',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php' => 
  array (
    'fileHash' => '0e7ad0fe0695ab3b68f7a9fc8e53122e11b59ad8',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php' => 
  array (
    'fileHash' => '6026da7b59545fbe1d9603feb1475d486df13a43',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php' => 
  array (
    'fileHash' => 'eaf5fc88b014e95d21d5eee3522158443ef651ff',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php' => 
  array (
    'fileHash' => '2c3fd2167dba8e92a5e28c237813d9c685d0cf14',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php' => 
  array (
    'fileHash' => 'd3b8f5cfea7b638052095d578abfce13f900c022',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php' => 
  array (
    'fileHash' => '1ea4f839ab494bd4d5ed78298e66a12adcacdb88',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php' => 
  array (
    'fileHash' => 'e6be49ed2ae22e7d1778ced00068aebe1440f606',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php' => 
  array (
    'fileHash' => '5c7b37d165179c5f6fcb1ea9ea43275b8c3be2fc',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php' => 
  array (
    'fileHash' => '718c9c03c8e491eba33a60e34537445d067c22a6',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php' => 
  array (
    'fileHash' => '7889ed04c7102d59168dca11e8b1a6ab2cce80ee',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php' => 
  array (
    'fileHash' => '54dbde91a2c3e204cc670387f09b5868856a46fb',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php' => 
  array (
    'fileHash' => '8c9ec258747144e0cc6bbc46c81ef561d708d314',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php' => 
  array (
    'fileHash' => 'db947b41225f038b71fe6391212a39078b658118',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php' => 
  array (
    'fileHash' => 'dfd95a9af0506c100783714c673bd294abb63379',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php' => 
  array (
    'fileHash' => 'ffea59e3e1af1924441bcf0d9893b3dc296fb111',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php' => 
  array (
    'fileHash' => 'f93e5b1ab6506848073aedc0f8bfd10fc8d01cfd',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php' => 
  array (
    'fileHash' => '8b36b038d83e2244a7791e6c189490e0e4a0b5a0',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php' => 
  array (
    'fileHash' => '1ffceab37cd370bc77280ef0f5fdbd1fbf428723',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php' => 
  array (
    'fileHash' => '86aa6fdc5b938ca5929edd78fc43b4af019a84b5',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php' => 
  array (
    'fileHash' => 'b320374787de3a50bd6ea7e891196b208aad3baf',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InfoText.php' => 
  array (
    'fileHash' => 'e6a23f71548262fe57cce4f6b8d48b28c01665d2',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php' => 
  array (
    'fileHash' => 'b33b6ee3d5c4acf3029573da14d38abe43c4604c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      7 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php',
      8 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
      9 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      10 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
      11 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
      12 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php' => 
  array (
    'fileHash' => '4a43a6828b7d5fd292a644955d4efff2b0f35799',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php' => 
  array (
    'fileHash' => '6695078331930bc3128530ceb28c9a4f5dfe0267',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SchoolProfile.php' => 
  array (
    'fileHash' => '34952931d6d33a73134642d98c01e87349f15931',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbFaq.php' => 
  array (
    'fileHash' => '2fc2343579d07a1a4c350642d48fe17831aeda00',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbRequirement.php' => 
  array (
    'fileHash' => 'de5061cc225df6e9846386615e63ced6ca74525c',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbSetting.php' => 
  array (
    'fileHash' => 'ca1e9f0727ca1841977afdd756fa5b43671dd6cf',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbTimeline.php' => 
  array (
    'fileHash' => 'cfd6ea1a57eb3c1953e2d5abfcd488e45d54a254',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php' => 
  array (
    'fileHash' => 'b638e3ad1e55d2f18de2c87dcb2775752e18d761',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php' => 
  array (
    'fileHash' => '340d5ee58dc8d7a55644fdbc6943c9ced1edc8f4',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\AdminUserSeeder.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\VisualIdentity.php' => 
  array (
    'fileHash' => 'acad214eebf838f9c25c949ceb4c220412db2672',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Providers\\AppServiceProvider.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Providers\\AppServiceProvider.php' => 
  array (
    'fileHash' => '6d0c90f72c10d1e2a7eb817545a2c62d6bd0e812',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php' => 
  array (
    'fileHash' => '31b003ddf5e7dd309340465b9b6ebdfcf2d94afe',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php',
      2 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php',
      3 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php',
      4 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php',
      5 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php',
      6 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php',
      7 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php',
      8 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php',
      9 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php',
      10 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php',
      11 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php',
      12 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
      13 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php',
      14 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
      15 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php',
    ),
    'usedTraitDependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php',
      1 => 'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2025_01_01_000000_create_users_table.php' => 
  array (
    'fileHash' => '992f21d6c221691d163fb99ac47f8ab5bb76c17e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2025_01_01_000001_create_cache_and_jobs_tables.php' => 
  array (
    'fileHash' => 'ee4baf81fabe9c3c09f1a08a60ff0bd8ed4725ec',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2025_01_01_000002_create_posts_tables.php' => 
  array (
    'fileHash' => 'a6ab6b6de89d2ebd9b1357d45dcd7a3c7850147e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2025_01_01_000003_create_school_profile_tables.php' => 
  array (
    'fileHash' => 'aa1de51217802b93772266fc3d895053fe2b7166',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2025_01_01_000004_create_chatbot_tables.php' => 
  array (
    'fileHash' => '9640ffb40447d86df5805496d98c7fd5077609b8',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_07_220205_add_status_to_announcements_table.php' => 
  array (
    'fileHash' => '6d189cd6dc7c0a8919914e50038a26fe101aec82',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_07_230227_add_status_to_agendas_table.php' => 
  array (
    'fileHash' => '63cdce1c8a786205c28d0b3158bb2b8627887739',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_10_062445_add_youtube_meta_to_activity_videos_table.php' => 
  array (
    'fileHash' => '612eee0a50b48ae10a39499b23354a103b9c4e4e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_10_071643_drop_deskripsi_from_activity_videos.php' => 
  array (
    'fileHash' => 'f93cc033c58f939431132f6b6ff73eab193d03fe',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_11_074521_rename_ppdb_settings_to_spmb_settings.php' => 
  array (
    'fileHash' => 'b8f5a965bfba10d49d01040ada12c581443caf1f',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_11_075224_update_spmb_settings_columns.php' => 
  array (
    'fileHash' => 'b1fb56f268461957dc622d886f66805f1ab96202',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_11_075727_create_spmb_related_tables.php' => 
  array (
    'fileHash' => 'c5fbb7d1b8f3c819afadba6b3e601398c4b1c9b8',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\migrations\\2026_01_11_080610_add_procedures_to_spmb_settings.php' => 
  array (
    'fileHash' => 'f9808eaed9225c2ad53155c92d2d2ee8a68837ed',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\AdminUserSeeder.php' => 
  array (
    'fileHash' => '5a070a5ce04d27109e8d595f903d5e04e09d24b9',
    'dependentFiles' => 
    array (
      0 => 'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\DatabaseSeeder.php',
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\DatabaseSeeder.php' => 
  array (
    'fileHash' => '8f18e02ed74f3cbdfe8226942ec1a547759ad7ee',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\routes\\admin.php' => 
  array (
    'fileHash' => '266e34b55c89706c5b3a3bea94b7988b3b58da58',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\routes\\api.php' => 
  array (
    'fileHash' => 'a24ba9d9eb97134b7ddd2b9cd363edd0ab43c80e',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\routes\\console.php' => 
  array (
    'fileHash' => '10ecb38ffc99bee1f8be94f945b8a87a71faef9c',
    'dependentFiles' => 
    array (
    ),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\routes\\web.php' => 
  array (
    'fileHash' => '0f2cf956bf47b70765f01ab4dfc31b5a1ebb696c',
    'dependentFiles' => 
    array (
    ),
  ),
),
	'exportedNodesCallback' => static function (): array { return array (
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\FileUploadService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Core\\Services\\FileUploadService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'uploadImage',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Upload single image file
     *
     * @param  int  $maxSize  Maximum size in KB (default: 5120 = 5MB)
     * @param  array  $allowedMimes  Allowed MIME types
     * @return string|null Path to uploaded file or null if no file
     *
     * @throws \\Exception
     */',
             'namespace' => 'App\\Core\\Services',
             'uses' => 
            array (
              'uploadedfile' => 'Illuminate\\Http\\UploadedFile',
              'log' => 'Illuminate\\Support\\Facades\\Log',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'file',
               'type' => '?Illuminate\\Http\\UploadedFile',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'folder',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'maxSize',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'allowedMimes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'uploadImages',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Upload multiple image files
     *
     * @param  array  $files  Array of UploadedFile
     * @param  int  $maxSize  Maximum size in KB
     * @param  array  $allowedMimes  Allowed MIME types
     * @return array Array of uploaded file paths
     *
     * @throws \\Exception
     */',
             'namespace' => 'App\\Core\\Services',
             'uses' => 
            array (
              'uploadedfile' => 'Illuminate\\Http\\UploadedFile',
              'log' => 'Illuminate\\Support\\Facades\\Log',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'files',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'folder',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'maxSize',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'allowedMimes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deleteImage',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'path',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deleteImages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'paths',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'validateImage',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Validate image file
     *
     * @param  int  $maxSize  Maximum size in KB
     * @param  array  $allowedMimes  Allowed MIME types
     * @return array [\'valid\' => bool, \'message\' => string]
     */',
             'namespace' => 'App\\Core\\Services',
             'uses' => 
            array (
              'uploadedfile' => 'Illuminate\\Http\\UploadedFile',
              'log' => 'Illuminate\\Support\\Facades\\Log',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'file',
               'type' => '?Illuminate\\Http\\UploadedFile',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'maxSize',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'allowedMimes',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Core\\Services\\NotificationService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Core\\Services\\NotificationService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'success',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'entity',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'error',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'entity',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'customSuccess',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'customError',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\ChatbotService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Domain\\Chatbot\\Services\\ChatbotService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'textProcessor',
               'type' => 'App\\Domain\\Chatbot\\Services\\TextProcessingService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'processMessage',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sessionId',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'ipAddress',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
            3 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'userAgent',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearCache',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Chatbot\\Services\\TextProcessingService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Domain\\Chatbot\\Services\\TextProcessingService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'preprocess',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'text',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'extractKeywords',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'text',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'calculateStringSimilarity',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'str1',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'str2',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'jaccardSimilarity',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'float',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'arr1',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'arr2',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\HomeDataService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Domain\\Content\\Services\\HomeDataService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHomeData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getSchoolProfile',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getBanners',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getHighlightNews',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getLatestNews',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getLatestArticles',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getFotoKegiatan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPrestasiSiswa',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getInfoTerkini',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getAgendaTerbaru',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getLastPostUpdate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'int',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getTickerItems',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getVideoKegiatan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getPromosiBannerPath',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => '?string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearCache',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearCacheOnContentUpdate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Content\\Services\\PostService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Domain\\Content\\Services\\PostService',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Service layer untuk logika bisnis Post (Berita/Artikel)
 * Menangani create, update, delete, dan operasi terkait file
 */',
         'namespace' => 'App\\Domain\\Content\\Services',
         'uses' => 
        array (
          'fileuploadservice' => 'App\\Core\\Services\\FileUploadService',
          'poststatus' => 'App\\Enums\\PostStatus',
          'posttype' => 'App\\Enums\\PostType',
          'post' => 'App\\Models\\Post',
          'request' => 'Illuminate\\Http\\Request',
          'auth' => 'Illuminate\\Support\\Facades\\Auth',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fileUploadService',
               'type' => 'App\\Core\\Services\\FileUploadService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'createPost',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Membuat post baru
     */',
             'namespace' => 'App\\Domain\\Content\\Services',
             'uses' => 
            array (
              'fileuploadservice' => 'App\\Core\\Services\\FileUploadService',
              'poststatus' => 'App\\Enums\\PostStatus',
              'posttype' => 'App\\Enums\\PostType',
              'post' => 'App\\Models\\Post',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Post',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updatePost',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update post existing
     */',
             'namespace' => 'App\\Domain\\Content\\Services',
             'uses' => 
            array (
              'fileuploadservice' => 'App\\Core\\Services\\FileUploadService',
              'poststatus' => 'App\\Enums\\PostStatus',
              'posttype' => 'App\\Enums\\PostType',
              'post' => 'App\\Models\\Post',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'App\\Models\\Post',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'deletePost',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Hapus post dan file terkait
     */',
             'namespace' => 'App\\Domain\\Content\\Services',
             'uses' => 
            array (
              'fileuploadservice' => 'App\\Core\\Services\\FileUploadService',
              'poststatus' => 'App\\Enums\\PostStatus',
              'posttype' => 'App\\Enums\\PostType',
              'post' => 'App\\Models\\Post',
              'request' => 'Illuminate\\Http\\Request',
              'auth' => 'Illuminate\\Support\\Facades\\Auth',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'prepareData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'validatedData',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => '?App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleSlugLogic',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => '?App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleThumbnailLogic',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => '?App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleContentImagesLogic',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => '?App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleScheduledTimeLogic',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => '?App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleTagsLogic',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleBodyAndMetaLogic',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => '?App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handlePublicationTimeLogics',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'data',
               'type' => 'array',
               'byRef' => true,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        12 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handlePostCreateActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        13 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handlePostUpdateActions',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        14 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isFeaturedBerita',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        15 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'enforceFeaturedLimit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        16 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearHomeCache',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        17 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getStatusMessage',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'action',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Domain\\Media\\Services\\YouTubeService.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Domain\\Media\\Services\\YouTubeService',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getVideoDetails',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'videoId',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostStatus.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Enums\\PostStatus',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'PUBLISHED',
           'value' => '\'published\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'DRAFT',
           'value' => '\'draft\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'UNPUBLISHED',
           'value' => '\'unpublished\'',
           'phpDoc' => NULL,
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isValid',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Enums\\PostType.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedEnumNode::__set_state(array(
       'name' => 'App\\Enums\\PostType',
       'scalarType' => 'string',
       'phpDoc' => NULL,
       'implements' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'BERITA',
           'value' => '\'berita\'',
           'phpDoc' => NULL,
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedEnumCaseNode::__set_state(array(
           'name' => 'ARTIKEL',
           'value' => '\'artikel\'',
           'phpDoc' => NULL,
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'label',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'string',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'values',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'isValid',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'bool',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'value',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityPhotoController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\ActivityPhotoController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fileUploadService',
               'type' => 'App\\Core\\Services\\FileUploadService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fotoKegiatan',
               'type' => 'App\\Models\\ActivityPhoto',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fotoKegiatan',
               'type' => 'App\\Models\\ActivityPhoto',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fotoKegiatan',
               'type' => 'App\\Models\\ActivityPhoto',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ActivityVideoController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\ActivityVideoController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'homeDataService',
               'type' => 'App\\Domain\\Content\\Services\\HomeDataService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'youTubeService',
               'type' => 'App\\Domain\\Media\\Services\\YouTubeService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'activityVideo',
               'type' => 'App\\Models\\ActivityVideo',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'activityVideo',
               'type' => 'App\\Models\\ActivityVideo',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'activityVideo',
               'type' => 'App\\Models\\ActivityVideo',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AnnouncementController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\AnnouncementController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'pengumuman',
               'type' => 'App\\Models\\Announcement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'pengumuman',
               'type' => 'App\\Models\\Announcement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'pengumuman',
               'type' => 'App\\Models\\Announcement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\AuthController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\AuthController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'adminLogin',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'adminAuthenticate',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'logout',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showChangeUsername',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'changeUsername',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showChangePassword',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'changePassword',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\CommentController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\CommentController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reply',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'approve',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'reject',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsRead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsUnread',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAllAsRead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'bulkApprove',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\DashboardController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\DashboardController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\HelpController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\HelpController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ImageUploadController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\ImageUploadController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle image upload from editor (Summernote)
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'request' => 'Illuminate\\Http\\Request',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\InboxController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\InboxController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'App\\Models\\InboxMessage',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'App\\Models\\InboxMessage',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsRead',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'App\\Models\\InboxMessage',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'markAsUnread',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'App\\Models\\InboxMessage',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PostController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\PostController',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Controller untuk CRUD Berita dan Artikel
 * Menangani create, read, update, delete posts
 */',
         'namespace' => 'App\\Http\\Controllers\\Admin',
         'uses' => 
        array (
          'poststatus' => 'App\\Enums\\PostStatus',
          'posttype' => 'App\\Enums\\PostType',
          'controller' => 'App\\Http\\Controllers\\Controller',
          'postrequest' => 'App\\Http\\Requests\\Admin\\PostRequest',
          'post' => 'App\\Models\\Post',
          'postservice' => 'App\\Domain\\Content\\Services\\PostService',
          'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
          'request' => 'Illuminate\\Http\\Request',
          'view' => 'Illuminate\\View\\View',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'postService',
               'type' => 'App\\Domain\\Content\\Services\\PostService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Halaman daftar posts (berita/artikel)
     * Menampilkan dengan filter dan sorting
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'poststatus' => 'App\\Enums\\PostStatus',
              'posttype' => 'App\\Enums\\PostType',
              'controller' => 'App\\Http\\Controllers\\Controller',
              'postrequest' => 'App\\Http\\Requests\\Admin\\PostRequest',
              'post' => 'App\\Models\\Post',
              'postservice' => 'App\\Domain\\Content\\Services\\PostService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\PostRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\PostRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'handleRedirect',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Handle redirection logic after save/update
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'poststatus' => 'App\\Enums\\PostStatus',
              'posttype' => 'App\\Enums\\PostType',
              'controller' => 'App\\Http\\Controllers\\Controller',
              'postrequest' => 'App\\Http\\Requests\\Admin\\PostRequest',
              'post' => 'App\\Models\\Post',
              'postservice' => 'App\\Domain\\Content\\Services\\PostService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'message',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'redirectToEdit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'post',
               'type' => 'App\\Models\\Post',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\PublicationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\PublicationController',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Controller untuk halaman Publikasi
 * Menggabungkan tampilan Berita dan Artikel dalam satu halaman
 */',
         'namespace' => 'App\\Http\\Controllers\\Admin',
         'uses' => 
        array (
          'poststatus' => 'App\\Enums\\PostStatus',
          'posttype' => 'App\\Enums\\PostType',
          'controller' => 'App\\Http\\Controllers\\Controller',
          'post' => 'App\\Models\\Post',
          'request' => 'Illuminate\\Http\\Request',
          'view' => 'Illuminate\\View\\View',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Halaman utama publikasi - menampilkan berita dan artikel
     * dengan fitur filter, search, dan view preference (table/grid)
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'poststatus' => 'App\\Enums\\PostStatus',
              'posttype' => 'App\\Enums\\PostType',
              'controller' => 'App\\Http\\Controllers\\Controller',
              'post' => 'App\\Models\\Post',
              'request' => 'Illuminate\\Http\\Request',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'redirectBerita',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'redirectArtikel',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\ScheduleController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\ScheduleController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'agenda',
               'type' => 'App\\Models\\Schedule',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'agenda',
               'type' => 'App\\Models\\Schedule',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'agenda',
               'type' => 'App\\Models\\Schedule',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SchoolProfileController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\SchoolProfileController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fileUploadService',
               'type' => 'App\\Core\\Services\\FileUploadService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'homeDataService',
               'type' => 'App\\Domain\\Content\\Services\\HomeDataService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SiteInformationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\SiteInformationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'storeKontak',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyKontak',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'kontak',
               'type' => 'App\\Models\\Contact',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\SpmbSettingController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\SpmbSettingController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\StudentAchievementController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\StudentAchievementController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'fileUploadService',
               'type' => 'App\\Core\\Services\\FileUploadService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'create',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'edit',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'prestasiSiswa',
               'type' => 'App\\Models\\StudentAchievement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'prestasiSiswa',
               'type' => 'App\\Models\\StudentAchievement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroy',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'prestasiSiswa',
               'type' => 'App\\Models\\StudentAchievement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Admin\\VisualIdentityController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Admin\\VisualIdentityController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'update',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateSettings',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update global banner information (used by all slides).
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'banner' => 'App\\Models\\Banner',
              'visualidentity' => 'App\\Models\\VisualIdentity',
              'homedataservice' => 'App\\Domain\\Content\\Services\\HomeDataService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'uploadBanner',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Upload banner image (multiple files)
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'banner' => 'App\\Models\\Banner',
              'visualidentity' => 'App\\Models\\VisualIdentity',
              'homedataservice' => 'App\\Domain\\Content\\Services\\HomeDataService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyBanner',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'banner',
               'type' => 'App\\Models\\Banner',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'uploadPromosi',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Upload banner promosi
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'banner' => 'App\\Models\\Banner',
              'visualidentity' => 'App\\Models\\VisualIdentity',
              'homedataservice' => 'App\\Domain\\Content\\Services\\HomeDataService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'destroyPromosi',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'updateBannerOrder',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Update banner order
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'banner' => 'App\\Models\\Banner',
              'visualidentity' => 'App\\Models\\VisualIdentity',
              'homedataservice' => 'App\\Domain\\Content\\Services\\HomeDataService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggleBanner',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Toggle banner active status
     */',
             'namespace' => 'App\\Http\\Controllers\\Admin',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'banner' => 'App\\Models\\Banner',
              'visualidentity' => 'App\\Models\\VisualIdentity',
              'homedataservice' => 'App\\Domain\\Content\\Services\\HomeDataService',
              'redirectresponse' => 'Illuminate\\Http\\RedirectResponse',
              'request' => 'Illuminate\\Http\\Request',
              'storage' => 'Illuminate\\Support\\Facades\\Storage',
              'view' => 'Illuminate\\View\\View',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\RedirectResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'banner',
               'type' => 'App\\Models\\Banner',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Api\\ChatbotController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Api\\ChatbotController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'chatbotService',
               'type' => 'App\\Domain\\Chatbot\\Services\\ChatbotService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'chat',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Process chatbot message
     *
     * @param Request $request
     * @return JsonResponse
     */',
             'namespace' => 'App\\Http\\Controllers\\Api',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'chatbotservice' => 'App\\Domain\\Chatbot\\Services\\ChatbotService',
              'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
              'request' => 'Illuminate\\Http\\Request',
              'http' => 'Illuminate\\Support\\Facades\\Http',
              'validator' => 'Illuminate\\Support\\Facades\\Validator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'clearCache',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Clear chatbot cache (for admin use)
     *
     * @return JsonResponse
     */',
             'namespace' => 'App\\Http\\Controllers\\Api',
             'uses' => 
            array (
              'controller' => 'App\\Http\\Controllers\\Controller',
              'chatbotservice' => 'App\\Domain\\Chatbot\\Services\\ChatbotService',
              'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
              'request' => 'Illuminate\\Http\\Request',
              'http' => 'Illuminate\\Support\\Facades\\Http',
              'validator' => 'Illuminate\\Support\\Facades\\Validator',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Controller.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Controller',
       'phpDoc' => NULL,
       'abstract' => true,
       'final' => false,
       'extends' => NULL,
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ApiController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\ApiController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'lastPostUpdate',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get last post update timestamp
     */',
             'namespace' => 'App\\Http\\Controllers\\Web',
             'uses' => 
            array (
              'posttype' => 'App\\Enums\\PostType',
              'controller' => 'App\\Http\\Controllers\\Controller',
              'activityphoto' => 'App\\Models\\ActivityPhoto',
              'announcement' => 'App\\Models\\Announcement',
              'contact' => 'App\\Models\\Contact',
              'infotext' => 'App\\Models\\InfoText',
              'post' => 'App\\Models\\Post',
              'schedule' => 'App\\Models\\Schedule',
              'schoolinfo' => 'App\\Models\\SchoolInfo',
              'studentachievement' => 'App\\Models\\StudentAchievement',
              'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'tagSuggestions',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get tag suggestions
     */',
             'namespace' => 'App\\Http\\Controllers\\Web',
             'uses' => 
            array (
              'posttype' => 'App\\Enums\\PostType',
              'controller' => 'App\\Http\\Controllers\\Controller',
              'activityphoto' => 'App\\Models\\ActivityPhoto',
              'announcement' => 'App\\Models\\Announcement',
              'contact' => 'App\\Models\\Contact',
              'infotext' => 'App\\Models\\InfoText',
              'post' => 'App\\Models\\Post',
              'schedule' => 'App\\Models\\Schedule',
              'schoolinfo' => 'App\\Models\\SchoolInfo',
              'studentachievement' => 'App\\Models\\StudentAchievement',
              'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'search',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Global search across all content
     */',
             'namespace' => 'App\\Http\\Controllers\\Web',
             'uses' => 
            array (
              'posttype' => 'App\\Enums\\PostType',
              'controller' => 'App\\Http\\Controllers\\Controller',
              'activityphoto' => 'App\\Models\\ActivityPhoto',
              'announcement' => 'App\\Models\\Announcement',
              'contact' => 'App\\Models\\Contact',
              'infotext' => 'App\\Models\\InfoText',
              'post' => 'App\\Models\\Post',
              'schedule' => 'App\\Models\\Schedule',
              'schoolinfo' => 'App\\Models\\SchoolInfo',
              'studentachievement' => 'App\\Models\\StudentAchievement',
              'jsonresponse' => 'Illuminate\\Http\\JsonResponse',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Http\\JsonResponse',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\CommentController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'slug',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\CommentLikeController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\CommentLikeController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'toggle',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'comment',
               'type' => 'App\\Models\\Comment',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ContactController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\ContactController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'store',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\GalleryController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\GalleryController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'fotoKegiatan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'videoKegiatan',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'dokumentasi',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'prestasiSiswa',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showPrestasiSiswa',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'prestasiSiswa',
               'type' => 'App\\Models\\StudentAchievement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\HomeController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\HomeController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => '__construct',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'homeDataService',
               'type' => 'App\\Domain\\Content\\Services\\HomeDataService',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\View\\View',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\InformationController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\InformationController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'berita',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'artikel',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'byTag',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tag',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'pengumuman',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showAnnouncement',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'announcement',
               'type' => 'App\\Models\\Announcement',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'agenda',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'showAgenda',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'schedule',
               'type' => 'App\\Models\\Schedule',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'show',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'slug',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'globalSearch',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\ProfileController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\ProfileController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getSidebarData',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'informasiSekolah',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'visiMisi',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'sejarah',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'strukturOrganisasi',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'kepalaSekolahGuru',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'prestasi',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\SpmbController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\SpmbController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Controllers\\Web\\UnderConstructionController.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Controllers\\Web\\UnderConstructionController',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'App\\Http\\Controllers\\Controller',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'index',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'socialMediaUnavailable',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\PostRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\PostRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'prepareForValidation',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'withValidator',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'validator',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreActivityPhotoRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\StoreActivityPhotoRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreAnnouncementRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\StoreAnnouncementRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreScheduleRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\StoreScheduleRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\StoreStudentAchievementRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\StoreStudentAchievementRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\UpdateActivityPhotoRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateAnnouncementRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\UpdateAnnouncementRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateScheduleRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\UpdateScheduleRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Http\\Requests\\Admin\\UpdateStudentAchievementRequest',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Http\\FormRequest',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'authorize',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'bool',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'rules',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'messages',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityPhoto.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ActivityPhoto',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOrdered',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ActivityVideo.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ActivityVideo',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getEmbedUrlAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getThumbnailUrlAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'getYoutubeIdAttribute',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Announcement.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Announcement',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'App\\Traits\\Filterable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOrdered',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeSearch',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'term',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeStatusFilter',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'status',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Banner.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Banner',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOrdered',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotConversation.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ChatbotConversation',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeSession',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to filter by session
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sessionId',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeRecent',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to get recent conversations
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'days',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeLowConfidence',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to get low confidence conversations (need review)
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'threshold',
               'type' => 'float',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeMethod',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to filter by method
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'method',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotFaq.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ChatbotFaq',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to get only active FAQs
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeCategory',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to filter by category
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'category',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopePopular',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to get popular FAQs
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'limit',
               'type' => 'int',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'incrementViewCount',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Increment view count
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\ChatbotIntent.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\ChatbotIntent',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to get only active intents
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByPriority',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to order by priority
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeCategory',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Scope to filter by category
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'category',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Comment.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Comment',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'post',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'parent',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'children',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'likes',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\HasMany',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeApproved',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeUnread',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeNewest',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\CommentLike.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\CommentLike',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'comment',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'user',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Contact.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Contact',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOrdered',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InboxMessage.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\InboxMessage',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeUnread',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\InfoText.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\InfoText',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Post.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Post',
       'phpDoc' => 
      \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
         'phpDocString' => '/**
 * Model untuk Post (Berita dan Artikel)
 * Menggunakan trait Filterable untuk query filtering
 */',
         'namespace' => 'App\\Models',
         'uses' => 
        array (
          'filterable' => 'App\\Traits\\Filterable',
          'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
          'model' => 'Illuminate\\Database\\Eloquent\\Model',
          'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
          'str' => 'Illuminate\\Support\\Str',
        ),
         'constUses' => 
        array (
        ),
      )),
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'App\\Traits\\Filterable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Clear home cache ketika post diubah
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'filterable' => 'App\\Traits\\Filterable',
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'model' => 'Illuminate\\Database\\Eloquent\\Model',
              'belongsto' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
              'str' => 'Illuminate\\Support\\Str',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopePublished',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOfType',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'type',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeSearch',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'term',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        6 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeByTag',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'tag',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        7 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'author',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        8 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'comments',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        9 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'approvedComments',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        10 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'views',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        11 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'incrementViewCount',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sessionId',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'ipAddress',
               'type' => '?string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\PostView.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\PostView',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'post',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Relations\\BelongsTo',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\Schedule.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\Schedule',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOrdered',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SchoolProfile.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SchoolProfile',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbFaq.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SpmbFaq',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbRequirement.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SpmbRequirement',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbSetting.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SpmbSetting',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\SpmbTimeline.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\SpmbTimeline',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'guarded',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\StudentAchievement.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\StudentAchievement',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'table',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        3 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeActive',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        4 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeOrdered',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => NULL,
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => NULL,
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        5 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'booted',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => true,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\User.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\User',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Foundation\\Auth\\User',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
        0 => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
        1 => 'Illuminate\\Notifications\\Notifiable',
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'hidden',
          ),
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
            ),
             'constUses' => 
            array (
            ),
          )),
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        2 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'casts',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */',
             'namespace' => 'App\\Models',
             'uses' => 
            array (
              'hasfactory' => 'Illuminate\\Database\\Eloquent\\Factories\\HasFactory',
              'authenticatable' => 'Illuminate\\Foundation\\Auth\\User',
              'notifiable' => 'Illuminate\\Notifications\\Notifiable',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'array',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Models\\VisualIdentity.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Models\\VisualIdentity',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Eloquent\\Model',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'fillable',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedPropertiesNode::__set_state(array(
           'names' => 
          array (
            0 => 'casts',
          ),
           'phpDoc' => NULL,
           'type' => NULL,
           'public' => false,
           'private' => false,
           'static' => false,
           'readonly' => false,
           'abstract' => false,
           'final' => false,
           'publicSet' => false,
           'protectedSet' => false,
           'privateSet' => false,
           'virtual' => false,
           'attributes' => 
          array (
          ),
           'hooks' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Providers\\AppServiceProvider.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'App\\Providers\\AppServiceProvider',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Support\\ServiceProvider',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'register',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Register any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'paginator' => 'Illuminate\\Pagination\\Paginator',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'view' => 'Illuminate\\Support\\Facades\\View',
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
              'schoolprofile' => 'App\\Models\\SchoolProfile',
              'visualidentity' => 'App\\Models\\VisualIdentity',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'boot',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Bootstrap any application services.
     */',
             'namespace' => 'App\\Providers',
             'uses' => 
            array (
              'paginator' => 'Illuminate\\Pagination\\Paginator',
              'carbon' => 'Illuminate\\Support\\Carbon',
              'view' => 'Illuminate\\Support\\Facades\\View',
              'serviceprovider' => 'Illuminate\\Support\\ServiceProvider',
              'schoolprofile' => 'App\\Models\\SchoolProfile',
              'visualidentity' => 'App\\Models\\VisualIdentity',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\app\\Traits\\Filterable.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedTraitNode::__set_state(array(
       'name' => 'App\\Traits\\Filterable',
       'phpDoc' => NULL,
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'scopeApplyFilters',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Apply standard filters and sorting to the query.
     *
     * @param Builder $query
     * @param Request $request
     * @param array $sortMapping Mapping logic for specific sort keys.
     *                           Example: [\'title_asc\' => [\'title\', \'asc\'], \'date_desc\' => [\'published_at\', \'desc\']]
     * @return Builder
     */',
             'namespace' => 'App\\Traits',
             'uses' => 
            array (
              'builder' => 'Illuminate\\Database\\Eloquent\\Builder',
              'request' => 'Illuminate\\Http\\Request',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'Illuminate\\Database\\Eloquent\\Builder',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'request',
               'type' => 'Illuminate\\Http\\Request',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sortMapping',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => true,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
        1 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'applySorting',
           'phpDoc' => NULL,
           'byRef' => false,
           'public' => false,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
            0 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'query',
               'type' => 'Illuminate\\Database\\Eloquent\\Builder',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            1 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sort',
               'type' => 'string',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
            2 => 
            \PHPStan\Dependency\ExportedNode\ExportedParameterNode::__set_state(array(
               'name' => 'sortMapping',
               'type' => 'array',
               'byRef' => false,
               'variadic' => false,
               'hasDefault' => false,
               'attributes' => 
              array (
              ),
            )),
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\AdminUserSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\AdminUserSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Run the database seeds.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'user' => 'App\\Models\\User',
              'seeder' => 'Illuminate\\Database\\Seeder',
              'hash' => 'Illuminate\\Support\\Facades\\Hash',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
  'C:\\Project\\mts-nurul-falaah-soreang\\database\\seeders\\DatabaseSeeder.php' => 
  array (
    0 => 
    \PHPStan\Dependency\ExportedNode\ExportedClassNode::__set_state(array(
       'name' => 'Database\\Seeders\\DatabaseSeeder',
       'phpDoc' => NULL,
       'abstract' => false,
       'final' => false,
       'extends' => 'Illuminate\\Database\\Seeder',
       'implements' => 
      array (
      ),
       'usedTraits' => 
      array (
      ),
       'traitUseAdaptations' => 
      array (
      ),
       'statements' => 
      array (
        0 => 
        \PHPStan\Dependency\ExportedNode\ExportedMethodNode::__set_state(array(
           'name' => 'run',
           'phpDoc' => 
          \PHPStan\Dependency\ExportedNode\ExportedPhpDocNode::__set_state(array(
             'phpDocString' => '/**
     * Seed the application\'s database.
     */',
             'namespace' => 'Database\\Seeders',
             'uses' => 
            array (
              'seeder' => 'Illuminate\\Database\\Seeder',
            ),
             'constUses' => 
            array (
            ),
          )),
           'byRef' => false,
           'public' => true,
           'private' => false,
           'abstract' => false,
           'final' => false,
           'static' => false,
           'returnType' => 'void',
           'parameters' => 
          array (
          ),
           'attributes' => 
          array (
          ),
        )),
      ),
       'attributes' => 
      array (
      ),
    )),
  ),
); },
];
