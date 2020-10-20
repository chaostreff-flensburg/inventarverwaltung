# ~/.bashrc: executed by bash(1) for non-login shells.

# aliasses for colorized ls
export LS_OPTIONS='--color=auto'
alias ls='ls $LS_OPTIONS'
alias ll='ls $LS_OPTIONS -l'
alias l='ls $LS_OPTIONS -lA'

# comfort aliasses
alias artisan="php artisan"
alias routes="artisan route:list --columns=method,uri,name,action"
alias seed="artisan migrate:fresh --seed"
alias cdump="composer dump-autoload"
alias clear-all="artisan cache:clear & artisan route:clear &  artisan view:clear"

force_color_prompt=yes
PS1='\[\033[1;36m\]\u\[\033[1;31m\]\[\033[1;32m\]:\[\033[1;35m\]\w\[\033[1;31m\]\$\[\033[0m\] '

_artisan()
{
	COMP_WORDBREAKS=${COMP_WORDBREAKS//:}
	COMMANDS=`artisan --raw --no-ansi list | sed "s/[[:space:]].*//g"`
	COMPREPLY=(`compgen -W "$COMMANDS" -- "${COMP_WORDS[COMP_CWORD]}"`)
	return 0
}

complete -F _artisan artisan

clear
